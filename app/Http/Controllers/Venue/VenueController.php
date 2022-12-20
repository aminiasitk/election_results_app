<?php

namespace App\Http\Controllers\Venue;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\VenueRequest;

use Exception;
use Illuminate\Validation\ValidationException;

use Illuminate\Support\Facades\DB;

use App\Models\Area;

class VenueController extends Controller
{
    public $table_name = 'election_venue';
    public $query_params = [];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('venues.index')->with([
            'page_title'        => 'All Venues',
            'data'              => DB::table($this->table_name)->paginate($this->per_page),
            'classification'    => $this->venue_class,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('venues.create')->with([
            'page_title'        => 'Add Venue',
            'classification'    => $this->venue_class,
            'areas'             => DB::table('division_areas')->orderBy('name', 'asc')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VenueRequest $request)
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

        return redirect()->route('venue.create')->with([
            "code" 		        => $this->status_codes['success'],
            'title'             => 'Venue Created!',
            'create_status'     => "Venue  has been created successfully.",
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
