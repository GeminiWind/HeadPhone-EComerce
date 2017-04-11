<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = \App\Models\Event::all();
        return view('admins.events', ['events' => $events]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'rate'        => 'required|min:0',
            'description' => 'required',
            'began_at'    => 'required|date',
            'ended_at'    => 'required|date',
        ];
        $messages = [
            'rate.required'     => 'Enter the rate ',
            'began_at.required' => 'Required new',
            'ended_at.requied'  => 'required hot',
            'description'       => 'Required description',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if (!$validator->fails()) {
            $inputs = $request->only([
                'rate', 'description', 'began_at', 'ended_at',
            ]);
            $event = new \App\Models\Event;
            $event->forceFill($inputs);
            $product = Product::find($request->product_id);
            if ($product->isSale() != null) {
                if ($event->began_at < $product->isSale()->ended_at) {
                    return redirect()->back()->with('status', 'error');
                }
                $product->events()->save($event);
                $event->save();
                return redirect()->route('events.index')->with('status', 'success');
            } else {
                $product->events()->save($event);
                $event->save();
                return redirect()->route('events.index')->with('status', 'success');
            }
        } else {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('status', 'error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'rate'        => 'required|min:0',
            'description' => 'required',
            'began_at'    => 'required|date',
            'ended_at'    => 'required|date',
        ];
        $messages = [
            'rate.required'     => 'Enter the rate ',
            'began_at.required' => 'Required new',
            'ended_at.requied'  => 'required hot',
            'description'       => 'Required description',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if (!$validator->fails()) {
            $inputs = $request->only([
                'rate', 'description', 'began_at', 'ended_at',
            ]);
            $event = \App\Models\Event::find($id);
            if ($event) {
                $event->update($inputs);
                $event->save();
                return redirect()->route('events.index')->with('status', 'success');
            }
        } else {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('status', 'error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = \App\Models\Event::find($id);
        if ($event) {
            $event->delete();
            return redirect()->route('events.index')->with('status', 'success');
        }
        return redirect()->back()->with('status', 'error');
    }
}
