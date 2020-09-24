var app = new Vue({
    el: '#app',
    data: {

        toBeDeletedHomepageId:'',

    },
    methods: {

        setHomepageIdForDelete: function (toBeDeletedHomepageId) {
            this.toBeDeletedHomepageId = toBeDeletedHomepageId;

        },







    },

    computed: {
        deleteUrl: function() {
            return basePath + 'backend/homepage/delete/' + this.toBeDeletedHomepageId;
        }
    }


});
