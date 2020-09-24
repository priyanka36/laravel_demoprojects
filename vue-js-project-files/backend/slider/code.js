var app = new Vue({
    el: '#app',
    data: {

        toBeDeletedSliderId:'',

    },
    methods: {

        setSliderIdForDelete: function (toBeDeletedSliderId) {
            this.toBeDeletedSliderId = toBeDeletedSliderId;

        },







    },

    computed: {
        deleteUrl: function() {
            return basePath + 'backend/slider/delete/' + this.toBeDeletedSliderId;
        }
    }


});
