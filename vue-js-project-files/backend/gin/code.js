var app = new Vue({
    el: '#app',
    data: {

        toBeDeletedGinId:'',

    },
    methods: {

        setGinIdForDelete: function (toBeDeletedGinId) {
            this.toBeDeletedGinId = toBeDeletedGinId;

        },







    },

    computed: {
        deleteUrl: function() {
            return basePath + 'backend/gin/delete/' + this.toBeDeletedGinId;
        }
    }


});
