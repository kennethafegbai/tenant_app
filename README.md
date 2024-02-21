# DOCUMENTATION
## DESCRIPTION
This is a basic app to showcase laravel subdomain multitenancy using a single database in a docker environment
## SETUP
1. After cloning, `cd` to project root directory
2. rename `.env.example` to .env
3. start up services by running `docker-compose up -d` to spring up the containers
4. After containers are up and running, run `docker exec laravel-docker bash -c "php artisan migrate:fresh --seed"` to migrate database
5. Once migration is successful, you can access the url `http://localhost:9000/` to see that laravel is already running in the container

## REMOVE IMAGES AND CONTAINERS
run `docker-compose down --rmi all -v`


# API DOCUMENTATION 

## URLS
baseURL=http://localhost:9000

tenantURL=http://tenant1.localhost:9000

## GET ALL TENANTS
endpoint: {{baseURL}}`/api/users`
method: `get`
response: `{
    "message": "Users retrieved successfully",
    "status": true,
    "data": [
        {
            "id": 1,
            "name": "Mary Hyatt",
            "subdomain": "tenant1",
            "email": "hand.noelia@example.org",
            "email_verified_at": "2024-02-21T07:23:39.000000Z",
            "created_at": "2024-02-21T07:23:39.000000Z",
            "updated_at": "2024-02-21T07:23:39.000000Z"
        },
        {
            "id": 2,
            "name": "Kenory",
            "subdomain": "tenant2",
            "email": "Kenory@gmail.com",
            "email_verified_at": null,
            "created_at": "2024-02-21T08:22:11.000000Z",
            "updated_at": "2024-02-21T08:22:11.000000Z"
        }
    ]
}`

## create TENANT
endpoint: {{baseURL}}`/api/create`
method: `post`
payload:
        `{
        "name":"steve",
        "email":"steve@gmail.com",
        "subdomain":"steve",
        "password":"steve"
        }`

response: 
        `{
            "message": "User created successfully",
            "status": true,
            "data": {
                "name": "steve",
                "email": "steve@gmail.com",
                "subdomain": "steve",
                "password": "steve"
            }
        }`


## get tenant record
endpoint: {{tenantURL}}`/api/users`
method: `get`
response: 
        `{
    "message": "Users retrieved successfully",
    "status": true,
    "data": [
        {
            "id": 1,
            "name": "Mary Hyatt",
            "subdomain": "tenant1",
            "email": "hand.noelia@example.org",
            "email_verified_at": "2024-02-21T07:23:39.000000Z",
            "created_at": "2024-02-21T07:23:39.000000Z",
            "updated_at": "2024-02-21T07:23:39.000000Z"
        }
    ]
}`