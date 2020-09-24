var app = new Vue({
    el: '#app',
    data: {

        toBeDeletedVodkaId:'',

    },
    methods: {

        setVodkaIdForDelete: function (toBeDeletedVodkaId) {
            this.toBeDeletedVodkaId = toBeDeletedVodkaId;

        },







    },

    computed: {
        deleteUrl: function() {
            return basePath + 'backend/vodka/delete/' + this.toBeDeletedVodkaId;
        }
    }


});
