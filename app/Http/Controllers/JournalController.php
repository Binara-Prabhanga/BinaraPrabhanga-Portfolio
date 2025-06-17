<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    // Show all journal entries
    public function index()
    {
        return response()->json(Journal::orderBy('created_at', 'desc')->get());
    }

    // Store a new entry
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'date' => 'nullable|date',
        ]);

        $journal = Journal::create($validated);

        return response()->json(['message' => 'Entry created', 'data' => $journal]);
    }

    // Update an existing entry
    public function update(Request $request, $id)
    {
        $journal = Journal::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'date' => 'nullable|date',
        ]);

        $journal->update($validated);

        return response()->json(['message' => 'Entry updated', 'data' => $journal]);
    }

    // Delete an entry
    public function destroy($id)
    {
        $journal = Journal::findOrFail($id);
        $journal->delete();

        return response()->json(['message' => 'Entry deleted']);
    }

    // View single entry (optional)
    public function show($id)
    {
        return response()->json(Journal::findOrFail($id));
    }
}
