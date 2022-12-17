<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddPartyRequest;
use Exception;
use Illuminate\Validation\ValidationException;

use Illuminate\Support\Facades\DB;

class PartyController extends Controller
{
    public $table_name = 'election_party';
    public $query_params = [];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('party.index')->with([
            'page_title' => 'All Parties',
            'data'       => DB::table($this->table_name)->paginate($this->per_page)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('party.create')->with([
            'page_title' => 'Add Party'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddPartyRequest $request)
    {

        DB::beginTransaction();

        try{

            $table_columns = DB::getSchemaBuilder()->getColumnListing($this->table_name);

            foreach ($table_columns as $column){
                if(isset($request[$column])){
                    $this->query_params[$column] = $request[$column];
                }
            }

            $new_party_id = DB::table($this->table_name)->insertGetId($this->query_params);

        } catch(\Exception $exception)  { 
            DB::rollBack();
            throw ValidationException::withMessages([
                'error' => $exception->getMessage(),
            ]);
        }

        DB::commit();

        return redirect()->route('party.index')->with([
            "code" 		        => $this->status_codes['success'],
            'title'             => 'Party Created!',
            'create_status'     => "Party account been created successfully.",
        ]);
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
        try{

            $data = DB::table($this->table_name)->find($id); 

            if(!$data) throw new Exception('Data not found!');

        } catch(\Exception $exception)  { 
            throw ValidationException::withMessages([
                'error' => $exception->getMessage(),
            ]);
        }

        return view('party.edit')->with([
            'page_title'    => 'Edit Party',
            'data'          => $data
        ]);
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
        DB::beginTransaction();

        try{

            $table_columns = DB::getSchemaBuilder()->getColumnListing($this->table_name);

            foreach ($table_columns as $column){
                if(isset($request[$column])){
                    $this->query_params[$column] = $request[$column];
                }
            }

            DB::table($this->table_name)->where('id', $id)->update($this->query_params);

        } catch(\Exception $exception)  { 
            DB::rollBack();
            throw ValidationException::withMessages([
                'error' => $exception->getMessage(),
            ]);
        }

        DB::commit();

        return redirect()->route('party.index')->with([
            "code" 		        => $this->status_codes['success'],
            'title'             => 'Party Update!',
            'create_status'     => "Party has been update successfully.",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $query = DB::table($this->table_name)->where('id', $id); 

            if(!$query) throw new Exception('Data not found!');

            $query->delete();

        } catch(\Exception $exception)  { 
            throw ValidationException::withMessages([
                'error' => $exception->getMessage(),
            ]);
        }

        return redirect()->route('party.index')->with([
            "code" 		        => $this->status_codes['success'],
            'title'             => 'Party Update!',
            'create_status'     => "Party has been update successfully.",
        ]);
    }
}
