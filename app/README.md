## Application main folder

The directories are organized this way:

- `Console/Commands` keeps all the Artisan console commands.
- `Exceptions is for exception handling
- `GraphQL` is the included GraphQL API service. It contains queries, mutations and model types.
- `Http` deals with the HTTP requests: it contains controllers, and request handlers,
- `Observers` keeps all the model observers organized. They allow to implement an event-driven approach to our application development.
- `Presenters` contains all the traits used by the models to manipulate data to be returned to requests.
- `Traits` contains all the non-presenter traits used by our application.

There is also a `helpers.php` file to allow easy writing of helpers, and the `BaseModel.php`, extended by all the models used.
