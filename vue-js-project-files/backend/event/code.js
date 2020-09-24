var app = new Vue({
    el: '#app',
    data: {

        toBeDeletedEventId:'',

    },
    methods: {

        setEventIdForDelete: function (toBeDeletedEventId) {
            this.toBeDeletedEventId = toBeDeletedEventId;

        },







    },

    computed: {
        deleteUrl: function() {
            return basePath + 'backend/event/delete/' + this.toBeDeletedEventId;
        }
    }


});
