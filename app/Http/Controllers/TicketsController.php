<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Ticket;
use App\Mailers\AppMailer;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tickets  = Ticket::paginate(10);
        $categories = Category::all();
        // if (Auth::user()->role_id == 2) {
        //     return view('lptsi.tickets-index', compact('tickets', 'categories'));
        // } else {
        //     return redirect()->back()->with('status', 'Forbidden');
        // }
        $role = Auth::user()->role_id;
        switch ($role) {
          case '2':
            return view('lptsi.tickets-index', compact('tickets', 'categories'));;
            break;
          case '3':
            return 'web admin';
            break;
          default:
            return redirect()->back()->with('warning', 'you have no authorization in here');
        }
    }

    public function create()
    {
        $categories = Category::all();
        if (Auth::user()->role_id == 3) {
            return view('webadmin.tickets-create', compact('categories'));
        }
    }

    public function store(Request $request, AppMailer $mailer)
    {
        if (Auth::user()->role_id == 3) {
            $this->validate($request, [
            'title'     => 'required',
            'category'  => 'required',
            'priority'  => 'required',
            'description'   => 'required'
        ]);

            $ticket = new Ticket([
            'title'     => $request->input('title'),
            'user_id'   => Auth::user()->id,
            'ticket_code' => strtoupper(str_random(10)),
            'category_id'  => $request->input('category'),
            'priority'  => $request->input('priority'),
            'description'   => $request->input('description'),
            'status'    => "Open",
        ]);

            $ticket->save();

            $mailer->sendTicketInformation(Auth::user(), $ticket);

            return redirect()->back()->with("status", "Tiket dengan ID: #$ticket->ticket_code telah dibuat.");
        } else {
            return redirect('/');
        }
    }

    public function userTickets()
    {
        $tickets = Ticket::where('user_id', Auth::user()->id)->paginate(10);
        $categories = Category::all();
        if (Auth::user()->role_id == 3) {
            return view('webadmin.tickets-usertickets', compact('tickets', 'categories'));
        } elseif (Auth::user()->role_id == 2) {
            return view('lptsi.tickets-usertickets', compact('tickets', 'categories'));
        }
    }

    public function show($ticket_code)
    {
        if (Auth::user()->role_id==3) {
            $user=Auth::user();
            $userTickets = $user->ticket()->where('user_id', $user->id);

            if ($userTickets->count() > 0) {
                $ticket = Ticket::where('ticket_code', $ticket_code)->firstOrFail();
                $comments = $ticket->comments;
                $category = $ticket->category;

                return view('webadmin.tickets-show', compact('ticket', 'category', 'comments'));
            } else {
                return redirect()->back()->with('status', 'Forbidden');
            }
        }

        if (Auth::user()->role_id==2) {
            $user=Auth::user();
            $ticket = Ticket::where('ticket_code', $ticket_code)->firstOrFail();
            $comments = $ticket->comments;
            $category = $ticket->category;

            return view('lptsi.tickets-show', compact('ticket', 'category', 'comments'));
        } else {
            return redirect()->back()->with('status', 'Forbidden');
        }
    }

    public function close($ticket_id)
    {
        $ticket = Ticket::where('id', $ticket_id)->firstOrFail();
        $ticket->status = 'Closed';
        $ticket->save();
        $ticketOwner = $ticket->user;
        return redirect()->back()->with("status", "The ticket has been closed.");
    }
}
