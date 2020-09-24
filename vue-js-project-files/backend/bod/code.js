var app = new Vue({
    el: '#app',
    data: {

        toBeDeletedBodId:'',

    },
    methods: {

        setBodIdForDelete: function (toBeDeletedBodId) {
            alert(toBeDeletedBodId);
            this.toBeDeletedBodId = toBeDeletedBodId;

        },







    },

    computed: {
        deleteUrl: function() {
            return basePath + 'backend/bod/delete/' + this.toBeDeletedBodId;
        }
    }


});
