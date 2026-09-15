<?php

namespace App\Http\Controllers;

use App\Models\FormQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FormQuestionController extends Controller
{
    public function __construct(){ $this->middleware('role:admin'); }

    private function rules(){
        return [
            'step'=>'required|integer|min:1|max:4',
            'label'=>'required|string|max:255',
            'field_type'=>'required|in:text,number,textarea,select,date',
            'options'=>'nullable|string|max:1000',
            'placeholder'=>'nullable|string|max:255',
            'is_required'=>'nullable|boolean',
            'is_active'=>'nullable|boolean',
            'sort_order'=>'nullable|integer',
        ];
    }

    private function makeFieldName($label, $id = null){
        $base = 'custom_'.Str::slug($label, '_');
        $base = preg_replace('/[^a-z0-9_]/','', strtolower($base));
        $base = substr($base, 0, 40) ?: 'custom_field';
        $name = $base;
        $i = 1;
        while (FormQuestion::where('field_name',$name)->when($id, fn($q)=>$q->where('id','!=',$id))->exists()) {
            $name = $base.'_'.$i++;
        }
        return $name;
    }

    public function index()
    {
        $questions = FormQuestion::orderBy('step')->orderBy('sort_order')->orderBy('id')->get();
        return view('admin.form-questions.index', compact('questions'));
    }

    public function create()
    {
        return view('admin.form-questions.form', ['question'=>new FormQuestion(['step'=>1,'field_type'=>'text','is_active'=>true])]);
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());
        $data['field_name'] = $this->makeFieldName($data['label']);
        $data['is_required'] = $request->boolean('is_required');
        $data['is_active'] = $request->boolean('is_active', true);
        $data['sort_order'] = $data['sort_order'] ?? 0;
        FormQuestion::create($data);
        return redirect()->route('form-questions.index')->with('success','Pertanyaan berhasil ditambah');
    }

    public function edit(FormQuestion $formQuestion)
    {
        return view('admin.form-questions.form', ['question'=>$formQuestion]);
    }

    public function update(Request $request, FormQuestion $formQuestion)
    {
        $data = $request->validate($this->rules());
        $data['is_required'] = $request->boolean('is_required');
        $data['is_active'] = $request->boolean('is_active');
        $formQuestion->update($data);
        return redirect()->route('form-questions.index')->with('success','Pertanyaan berhasil diupdate');
    }

    public function destroy(FormQuestion $formQuestion)
    {
        $formQuestion->delete();
        return back()->with('success','Pertanyaan dihapus');
    }
}
