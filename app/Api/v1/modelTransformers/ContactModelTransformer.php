<?php

namespace app\Api\v1\modelTransformers;

use App\Contact;
use League\Fractal\TransformerAbstract;

class ContactModelTransformer extends TransformerAbstract
{
    public function transform(Contact $contact) {

        return [
            'id' => $contact->id,
            'first_name' => $contact->first_name,
            'last_name' => $contact->last_name,
            'email' => $contact->email,
            'address' => $contact->address,
            'twitter' => $contact->twitter,
            'created_at' => $contact->created_at,
            'last_updated_at' => $contact->updated_at,
            'archived_at' => $contact->deleted_at
        ];
    }
}