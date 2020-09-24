var app = new Vue({
    el: '#app',
    data: {

        toBeDeletedWhiskyId:'',

    },
    methods: {

        setWhiskyIdForDelete: function (toBeDeletedWhiskyId) {
            this.toBeDeletedWhiskyId = toBeDeletedWhiskyId;

        },







    },

    computed: {
        deleteUrl: function() {
            return basePath + 'backend/whisky/delete/' + this.toBeDeletedWhiskyId;
        }
    }


});
