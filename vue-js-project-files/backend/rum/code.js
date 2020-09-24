var app = new Vue({
    el: '#app',
    data: {

        toBeDeletedRumId:'',

    },
    methods: {

        setRumIdForDelete: function (toBeDeletedRumId) {
            this.toBeDeletedRumId = toBeDeletedRumId;

        },







    },

    computed: {
        deleteUrl: function() {
            return basePath + 'backend/rum/delete/' + this.toBeDeletedRumId;
        }
    }


});
