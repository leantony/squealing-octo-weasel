<?php

namespace App\Api\v1\Controllers;

use app\Api\v1\modelTransformers\ContactModelTransformer;
use app\Api\ValidatorTrait;
use App\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ContactsRequest;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    use Helpers, ValidatorTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::with('owner')->get();

        return $this->response()->item($contact, new ContactModelTransformer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContactsRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'owner_id' => 'required|exists:users,id',
            'first_name' => 'required|alpha|between:3,20',
            'last_name' => 'required|alpha|between:3,20',
            'email' => 'required|unique:contacts',
            'address' => 'required|unique:contacts',
            'twitter' => 'required|unique:contacts',
        ];

        $this->validateRequest($request->all(), $rules);

        $contact = Contact::create($request->all());

        if (is_null($contact)) {
            $this->response()->errorInternal();
        } else {
            return $this->response()->created();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::whereId($id)->get();

        return $this->response()->item($contact, new ContactModelTransformer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'owner_id' => 'sometimes|required|exists:users,id',
            'first_name' => 'sometimes|required|alpha|between:3,20',
            'last_name' => 'sometimes|required|alpha|between:3,20',
            'email' => 'sometimes|required|unique:contacts',
            'twitter' => 'sometimes|required|unique:contacts'
        ];

        $this->validateRequest($request->all(), $rules);

        $contact = $this->findContact($id);

        $result = $contact->update($request->all());

        if ($result || $result == 1) {
            return $this->response()->item(Contact::find($id), new ContactModelTransformer);
        } else {
            $this->response()->errorInternal();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = $this->findContact($id);

        $contact->forceDelete();

        return $this->response()->noContent();
    }

    /**
     * @param $id
     * @return Contact
     */
    protected function findContact($id)
    {

        $contact = Contact::find($id);

        if (is_null($contact)) {

            $this->response()->errorNotFound();
        } else {

            return $contact;
        }
    }

    /**
     * Restore the specified resource
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $contact = Contact::withTrashed()->where('id', $id)->restore();
        if(is_null($contact)){

            $this->response()->errorNotFound();
        } else {

            return $this->response()->item($contact, new ContactModelTransformer);
        }

    }

    /**
     * Archive the specified resource
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function archive($id)
    {
        $contact = $this->findContact($id);

        $contact->delete();

        return $this->response()->noContent();
    }
}
