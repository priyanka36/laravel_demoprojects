var app = new Vue({
    el: '#app',
    data: {

        toBeDeletedEnrollId:'',

    },
    methods: {

        setEnrollIdForDelete: function (toBeDeletedEnrollId) {
            this.toBeDeletedEnrollId = toBeDeletedEnrollId;

        },







    },

    computed: {
        deleteUrl: function() {
            return basePath + 'backend/enroll/delete/' + this.toBeDeletedEnrollId;
        }
    }


});
