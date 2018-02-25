<?php

namespace App\Http\Controllers;

use App\Block;
use App\EmployeeActivity;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlocksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blocks = Block::get();
        return view('backend.blocks.index')
            ->with('blocks', $blocks);
    }

    /**
     * Show page for adding new blck
     */
    public function showNew()
    {
        return view('backend.blocks.new');

    }

    /*
     * Post new information about new block
     */
    public function postNew(Request $request)
    {
        $block = new Block();
        $block->name = $request->name;
        $block->description = $request->description;
        $block->active = 1;
        $block->save();
        $emp = new EmployeeActivity();
        $emp->emp_name = Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname;
        $emp->emp_info = Auth::user()->email . ' ' . Auth::user()->phone . ' ' . Auth::user()->address;
        $emp->operation = "New Block " . $request->name . " added";
        $emp->save();
        return back()->with('success', ' New Block has been added');

    }

    /**
     * Show edit form for blocks
     * @param $id
     * @return
     */
    public function showEdit($id)
    {
        $block = Block::find($id);
        return view('backend.blocks.edit')->withBlock($block);
    }

    /** post update information about the block
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postEdit(Request $request, $id)
    {
        $block = Block::find($id);
        $block->name = $request->name;
        $block->description = $request->description;
        $block->active = $request->available == "on" ? 1 : 0;
        $block->save();
        $emp = new EmployeeActivity();
        $emp->emp_name = Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname;
        $emp->emp_info = Auth::user()->email . ' ' . Auth::user()->phone . ' ' . Auth::user()->address;
        $emp->operation = "Edited Block " . $block->name . " with id" . $id;
        $emp->save();

        return back()->with('success', ' Block has been Updated!');
    }

    public function deleteBlock($id)
    {
        $block = Block::find($id);
        $block->delete();

        $emp = new EmployeeActivity();
        $emp->emp_name = Auth::user()->firstname . ' ' . Auth::user()->middlename . ' ' . Auth::user()->lastname;
        $emp->emp_info = Auth::user()->email . ' ' . Auth::user()->phone . ' ' . Auth::user()->address;
        $emp->operation = "Deleted Block " . $block->name . " with id" . $id;
        $emp->save();
        return back()->with('deleted', 'Block has been deleted!');
    }
}
