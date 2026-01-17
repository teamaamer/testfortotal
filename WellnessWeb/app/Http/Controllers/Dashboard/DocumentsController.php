<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequest;
use App\Models\Account;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentsController extends Controller
{

    public function show(Document $document)
    {
        return view('dashboard.documents.show')->with(compact('document'));
    }

    public function create(Account $account)
    {

        if (auth()->id() != $account->user->id && !auth()->user()->hasAnyRole(['admin'])) {
            abort(403);
        }

        return view('dashboard.documents.create_edit')->with(compact('account'));;
    }

    public function edit(Document $document)
    {

        if (auth()->id() != $document->account->user->id && !auth()->user()->hasAnyRole(['admin'])) {
            abort(403);
        }

        return view('dashboard.documents.create_edit')->with(compact('document'));
    }

    public function destroy(Document $document)
    {

        if (auth()->id() != $document->account->user->id && !auth()->user()->hasAnyRole(['admin'])) {
            abort(403);
        }

        $document->delete();
        return redirect('dashboard/accounts/' . $document->account->id)->with('success', $document->title . ' has been updated Successfully');

    }

    public function store(DocumentRequest $request)
    {

        $destinationPath = base_path('../uploads/documents');
        $filePath = hash('sha256', mt_rand()) . '.' . $request->file('file_path')->getClientOriginalExtension();
        $request->file('file_path')->move($destinationPath, $filePath);


        $document = Document::create([
            'account_id' => $request->account_id,
            'title' => $request->title,
            'type' => $request->type,
            'file_path' => $filePath
        ]);

        $document->save();

        return redirect('dashboard/accounts/' . $request->account_id)->with('success', $document->title . ' has been Created Successfully');
    }

     public function update(DocumentRequest $request, Document $document)
    {
        $document->title = $request->input('title');
        $document->type = $request->input('type');
   
        if ($request->hasFile('file_path')) {

            $destinationPath = base_path('../uploads/documents');

            @unlink(base_path($document->filePath));

            $filePath = hash('sha256', mt_rand()) . '.' . $request->file('file_path')->getClientOriginalExtension();
            $request->file('file_path')->move($destinationPath, $filePath);
            $document->file_path =  $filePath;
        }

        $document->save();
 
        return redirect('dashboard/accounts/' . $document->account->id)->with('success', $document->title . ' has been updated Successfully');
    }

}
