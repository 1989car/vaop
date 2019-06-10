<?php

namespace App\Http\Controllers\Messages;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Session;
use Junaidnasir\GlobalSettings\Facades\GlobalSettings;

class MessageController extends Controller
{
    public function index()
    {
        // All threads that user is participating in
        $threads = Thread::forUser(auth()->user()->id)->latest('updated_at')->get();
        
        if(count($threads) == 0){
            return redirect()->route('messages.start');
        }
    
        return redirect()->route('messages.thread',['id' => $threads[0]->id]);
    }
    
    public function start()
    {
        // All threads that user is participating in
        $threads = Thread::forUser(auth()->user()->id)->latest('updated_at')->get();
        
        if(GlobalSettings::get('allow-user-to-user-messaging') == '1'){
            $users = User::where('id','!=',auth()->user()->id)->orderBy('name')->get();
        }else{
            $users = User::where('id','!=',auth()->user()->id)->orderBy('name')->where('is_staff','=','1')->get();
        }

        return view('messages.start', [
            'threads' => $threads,
            'users' => $users,
        ]);
    }
    
    public function thread($id)
    {
        // TODO: Improve Error Handling
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect()->route('messages');
        }
        
        if(!$thread->hasParticipant(auth()->user()->id)){
            Session::flash('error_message', 'You are not authorized to access thread with ID: ' . $id . '.');
            return redirect()->route('messages');
        }
    
        $thread->markAsRead(auth()->user()->id);
        
        // All threads that user is participating in
        $threads = Thread::forUser(auth()->user()->id)->latest('updated_at')->get();
    
        return view('messages.index', [
            'threads' => $threads,
            'thread' => $thread,
            'users' => User::where('id','!=',auth()->user()->id)->orderBy('name')->get(),
        ]);
    }
    
    public function create()
    {
        // TODO: Add validation (+limit number of recipients)
        
        $thread = Thread::create([
            'subject' => request()->input('subject')
        ]);
        
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => auth()->user()->id,
            'body' => request()->input('message')
        ]);
        
        Participant::create([
            'thread_id' => $thread->id,
            'user_id' => auth()->user()->id,
            'last_read' => new Carbon(),
        ]);
        
        foreach(request()->input('recipients') as $recipient){
            $thread->addParticipant($recipient);
        }
        
        return redirect()->route('messages');
    }
    
    public function update($id)
    {
        // TODO: Improve Error Handling
        // TODO: Add validation
    
        try {
            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');
            return redirect()->route('messages');
        }
    
        if(!$thread->hasParticipant(auth()->user()->id)){
            Session::flash('error_message', 'You are not authorized to update thread with ID: ' . $id . '.');
            return redirect()->route('messages');
        }
    
        $thread->activateAllParticipants();
    
        Message::create([
            'thread_id' => $thread->id,
            'user_id' => auth()->user()->id,
            'body' => request()->input('message'),
        ]);
    
        $participant = Participant::firstOrCreate([
            'thread_id' => $thread->id,
            'user_id' => auth()->user()->id,
        ]);
        $participant->last_read = new Carbon;
        $participant->save();
    
        return redirect()->route('messages.thread', $id);
    }
}
