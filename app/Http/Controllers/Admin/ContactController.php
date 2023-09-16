<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Services\ContactService;
use Exception;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = $this->contactService->all();

        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactFormRequest $request)
    {
        try {

            $this->contactService->save($request->except('_token'));

            return redirect()->route('contacts.index');

        } catch (Exception $e) {

            return redirect()->back()->with('error', 'There was an error when trying to register. Try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $contact = $this->contactService->findById($id);

        if (!$contact) {
            return redirect()->back();
        }

        return view('admin.contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactFormRequest $request, string $id)
    {
        try {

            $this->contactService->update($request->except('_token'), $id);

            return redirect()->route('contacts.index');

        } catch (Exception $e) {

            return redirect()->back()->with('error', 'There was an error when trying to register. Try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function list()
    {
        $contacts = $this->contactService->all();

        return view('contacts-list', compact('contacts'));
    }
}
