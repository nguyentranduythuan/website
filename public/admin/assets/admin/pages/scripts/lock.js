var Lock = function () {

    return {
        //main function to initiate the module
        init: function () {

             $.backstretch([
		        "../../admin/assets/admin/pages/media/bg/1.jpg",
    		    "../../admin/assets/admin/pages/media/bg/2.jpg",
    		    "../../admin/assets/admin/pages/media/bg/3.jpg",
    		    "../../admin/assets/admin/pages/media/bg/4.jpg"
		        ], {
		          fade: 1000,
		          duration: 8000
		      });
        }

    };

}();