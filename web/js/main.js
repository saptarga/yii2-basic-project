jQuery(document).ready(function() {
    $('.user-inactive').click(function(e) {
        e.preventDefault();
         var url = $(this).attr('href');
 		bootbox.confirm({
 			title: "Inactive User?",
 		    message: "<p style=\"text-align:center;\"><i class=\"fa fa-exclamation-triangle\" style=\"font-size:150px;color:#ef8f28;\"></i> <br>Are you sure want to inactive this user? ?<p>",
 		    buttons: {
 		        confirm: {
 		            label: 'Yes',
 		            className: 'btn-success'
 		        },
 		        cancel: {
 		            label: 'No',
 		            className: 'btn-danger'
 		        }
 		    },
 		    callback: function (result) {
 		        if(result){
 		        	window.location = url;
 		        }
 		    }
 		});
    });

    $('.user-active').click(function(e) {
        e.preventDefault();
         var url = $(this).attr('href');
 		bootbox.confirm({
 			title: "Active User?",
 		    message: "<p style=\"text-align:center;\"><i class=\"fa fa-exclamation-triangle\" style=\"font-size:150px;color:#ef8f28;\"></i> <br>Are you sure want to active this user? ?<p>",
 		    buttons: {
 		        confirm: {
 		            label: 'Yes',
 		            className: 'btn-success'
 		        },
 		        cancel: {
 		            label: 'No',
 		            className: 'btn-danger'
 		        }
 		    },
 		    callback: function (result) {
 		        if(result){
 		        	window.location = url;
 		        }
 		    }
 		});
    });
});