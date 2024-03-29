<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/app.css" rel="stylesheet">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->



    <!-- Styles -->
</head>
<body>
<div id="app">
    <section class="px-8">
        <header class="container mb-10 mt-2">
            <h1>
                <img src="/images/logo_tweety.png"
                     alt="tweety"
                >
            </h1>
        </header>
    </section>

 {{$slot}}

</div>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
<script>
    class Errors {
        /**
         * Create a new Errors instance.
         */
        constructor() {
            this.errors = {};
        }


        /**
         * Determine if an errors exists for the given field.
         *
         * @param {string} field
         */
        has(field) {
            return this.errors.hasOwnProperty(field);
        }


        /**
         * Determine if we have any errors.
         */
        any() {
            return Object.keys(this.errors).length > 0;
        }


        /**
         * Retrieve the error message for a field.
         *
         * @param {string} field
         */
        get(field) {
            if (this.errors[field]) {
                return this.errors[field][0];
            }
        }


        /**
         * Record the new errors.
         *
         * @param {object} errors
         */
        record(errors) {
            this.errors = errors;
        }


        /**
         * Clear one or all error fields.
         *
         * @param {string|null} field
         */
        clear(field) {
            if (field) {
                delete this.errors[field];

                return;
            }

            this.errors = {};
        }
    }


    class Form {
        /**
         * Create a new Form instance.
         *
         * @param {object} data
         */
        constructor(data) {
            this.originalData = data;

            for (let field in data) {
                this[field] = data[field];
            }

            this.errors = new Errors();
        }


        /**
         * Fetch all relevant data for the form.
         */
        data() {
            let data = {};

            for (let property in this.originalData) {
                data[property] = this[property];
            }

            return data;
        }


        /**
         * Reset the form fields.
         */
        reset() {
            for (let field in this.originalData) {
                this[field] = '';
            }

            this.errors.clear();
        }


        /**
         * Send a POST request to the given URL.
         * .
         * @param {string} url
         */
        post(url) {
            return this.submit('post', url);
        }


        /**
         * Send a PUT request to the given URL.
         * .
         * @param {string} url
         */
        put(url) {
            return this.submit('put', url);
        }


        /**
         * Send a PATCH request to the given URL.
         * .
         * @param {string} url
         */
        patch(url) {
            return this.submit('patch', url);
        }


        /**
         * Send a DELETE request to the given URL.
         * .
         * @param {string} url
         */
        delete(url) {
            return this.submit('delete', url);
        }


        /**
         * Submit the form.
         *
         * @param {string} requestType
         * @param {string} url
         */
        submit(requestType, url) {
            return new Promise((resolve, reject) => {
                axios[requestType](url, this.data())
                    .then(response => {
                        this.onSuccess(response.data);

                        resolve(response.data);
                    })
                    .catch(error => {
                        this.onFail(error.response.data);

                        reject(error.response.data);
                    });
            });
        }


        /**
         * Handle a successful form submission.
         *
         * @param {object} data
         */
        onSuccess(data) {
            alert(data.message); // temporary

            this.reset();
        }


        /**
         * Handle a failed form submission.
         *
         * @param {object} errors
         */
        onFail(errors) {
            this.errors.record(errors);
        }
    }


    new Vue({
        el: '#app',

        data: {
            form: new Form({
                email: '',
                password: ''
            }),
            test:'reussie'
        },

        methods: {
            onSubmit() {
                this.form.post('/login')
                    .then(response => alert('Wahoo!'));
            }
        }
    });
</script>
</body>
</html>
