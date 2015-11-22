# contact manager API
The API is just for learning purposes. I did it so that I could, know more on how to deploy apps to heroku
The API has been seeded with test data
No authentication is required for any of the endpoints

Getting started:
root API url => https://shrouded-taiga-9986.herokuapp.com/api/v1/contacts

## HOW TO USE THE API

+ GET /contacts
Returns all contacts
```bash
curl -i https://shrouded-taiga-9986.herokuapp.com/api/v1/contacts
```

+ GET /contacts/{id}
Display a single contact
```bash
curl -i https://shrouded-taiga-9986.herokuapp.com/api/v1/contacts/1
```

+ POST /contacts/create
Saves a contact
```bash
curl -H "content-Type: application/json" -X POST -d '{
	"first_name": "nooooah",
    "last_name": "anto",
    "email": "leantony@github.com",
    "address": "12452210",
    "twitter": "leantony",
}' https://shrouded-taiga-9986.herokuapp.com/api/v1/contacts/create
```

+ PATCH /contacts/update/{id}
Updates a contact. Supply only the fields you want updated
```bash
curl -H "content-Type: application/json" -X PATCH -d '{
	"first_name": "antonyyyyy",
}' https://shrouded-taiga-9986.herokuapp.com/api/v1/contacts/update/1
```

+ PUT /contacts/restore/{id}
Restores a deleted contact. This would only work if the contact was deleted
```bash
curl -X PUT https://shrouded-taiga-9986.herokuapp.com/api/v1/contacts/restore/1
```

+ DELETE /contacts/delete{id}
Permanently deletes a contact
```bash
curl -X DELETE https://shrouded-taiga-9986.herokuapp.com/api/v1/contacts/delete/1
```

+ DELETE /contacts/archive/{id}
Temporarily deletes a contact. The contact model uses the softdeletes trait
```bash
curl -X DELETE https://shrouded-taiga-9986.herokuapp.com/api/v1/contacts/archive/1
```