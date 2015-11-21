# contact manager API

Getting started:
root url => http://shrouded-taiga-9986.herokuapp.com/api/v1

# API

+ GET /contacts
Returns all contacts
```json
{
  "contacts": [
    {
      "id": 1,
      "owner_id": 1,
      "first_name": "nooooah",
      "last_name": "anto",
      "email": "leantony@github.com",
      "address": "12452210",
      "twitter": "leantony",
      "created_at": "2015-11-21 12:01:48",
      "updated_at": "2015-11-21 17:30:09",
      "deleted_at": null,
      "owner": {
        "id": 1,
        "name": "Anto",
        "email": "a@b.com",
        "created_at": "2015-11-21 11:44:44",
        "updated_at": "2015-11-21 11:44:44"
      }
    },
  ]
}

```

+ GET /contacts/{id}
Display a single contact
```json
{
  "contacts": [
    {
      "id": 1,
      "owner_id": 1,
      "first_name": "nooooah",
      "last_name": "anto",
      "email": "leantony@github.com",
      "address": "12452210",
      "twitter": "leantony",
      "created_at": "2015-11-21 12:01:48",
      "updated_at": "2015-11-21 17:30:09",
      "deleted_at": null
    }
  ]
}
```

+ POST /contacts/create
Saves a contact

+ PATCH /contacts/update/{id}

+ PUT /contacts/restore/{id}

+ DELETE /contacts/delete{id}

+ DELETE /contacts/archive/{id}
