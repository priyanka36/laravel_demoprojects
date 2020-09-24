var app = new Vue({
    el: '#app',
    data: {

        toBeDeletedCareerId:'',

    },
    methods: {

        setCareerIdForDelete: function (toBeDeletedCareerId) {
            this.toBeDeletedCareerId = toBeDeletedCareerId;

        },







    },

    computed: {
        deleteUrl: function() {
            return basePath + 'backend/career/delete/' + this.toBeDeletedCareerId;
        }
    }


});
