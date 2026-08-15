 getPagination('#myTable');
    function getPagination(table) {
      var lastPage = 1;
      $('#maxRows')
        .on('change', function(evt) {
         lastPage = 1;
          $('.pagination')
            .find('li')
            .slice(1, -1)
            .remove();
          var trnum = 0; // reset tr counter
          var maxRows = parseInt($(this).val()); // get Max Rows from select option
    
          if (maxRows == 5000) {
            $('.pagination').hide();
          } else {
            $('.pagination').show();
          }
    
          var totalRows = $(table + ' tbody tr').length; // numbers of rows
          $(table + ' tr:gt(0)').each(function() {
            // each TR in  table and not the header
            trnum++; // Start Counter
            if (trnum > maxRows) {
              // if tr number gt maxRows
    
              $(this).hide(); // fade it out
            }
            if (trnum <= maxRows) {
              $(this).show();
            } // else fade in Important in case if it ..
          }); //  was fade out to fade it in
          if (totalRows > maxRows) {
            // if tr total rows gt max rows option
            var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
            //	numbers of pages
            for (var i = 1; i <= pagenum; ) {
              // for each page append pagination li
              $('.pagination #prev')
                .before(
                  '<li data-page="' +
                    i +
                    '">\
                                      <span>' +
                    i++ +
                    '<span class="sr-only">(current)</span></span>\
                                    </li>'
                )
                .show();
            } // end for i
          } // end if row count > max rows
          $('.pagination [data-page="1"]').addClass('active'); // add active class to the first li
          $('.pagination li').on('click', function(evt) {
            // on click each page
            evt.stopImmediatePropagation();
            evt.preventDefault();
            var pageNum = $(this).attr('data-page'); // get it's number
    
            var maxRows = parseInt($('#maxRows').val()); // get Max Rows from select option
    
            if (pageNum == 'prev') {
              if (lastPage == 1) {
                return;
              }
              pageNum = --lastPage;
            }
            if (pageNum == 'next') {
              if (lastPage == $('.pagination li').length - 2) {
                return;
              }
              pageNum = ++lastPage;
            }
    
            lastPage = pageNum;
            var trIndex = 0; // reset tr counter
            $('.pagination li').removeClass('active'); // remove active class from all li
            $('.pagination [data-page="' + lastPage + '"]').addClass('active'); // add active class to the clicked
            // $(this).addClass('active');					// add active class to the clicked
              limitPagging();
            $(table + ' tr:gt(0)').each(function() {
              // each tr in table not the header
              trIndex++; // tr index counter
              // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
              if (
                trIndex > maxRows * pageNum ||
                trIndex <= maxRows * pageNum - maxRows
              ) {
                $(this).hide();
              } else {
                $(this).show();
              } //else fade in
            }); // end of for each tr in table
          }); // end of on click pagination list
          limitPagging();
        })
        .val(5)
        .change();
    
      // end of on select change
    
      // END OF PAGINATION
    }
    
    function limitPagging(){
        // alert($('.pagination li').length)
    
        if($('.pagination li').length > 7 ){
                if( $('.pagination li.active').attr('data-page') <= 3 ){
                $('.pagination li:gt(5)').hide();
                $('.pagination li:lt(5)').show();
                $('.pagination [data-page="next"]').show();
            }if ($('.pagination li.active').attr('data-page') > 3){
                $('.pagination li:gt(0)').hide();
                $('.pagination [data-page="next"]').show();
                for( let i = ( parseInt($('.pagination li.active').attr('data-page'))  -2 )  ; i <= ( parseInt($('.pagination li.active').attr('data-page'))  + 2 ) ; i++ ){
                    $('.pagination [data-page="'+i+'"]').show();
    
                }
    
            }
        }
    }
    

  getpagination1('#myTable1');
  function getpagination1(table) {
    var lastPage = 1;
    $('#maxRows1')
      .on('change', function(evt) {
       lastPage = 1;
        $('.pagination-ing')
          .find('li')
          .slice(1, -1)
          .remove();
        var trnum = 0; // reset tr counter
        var maxRows = parseInt($(this).val()); // get Max Rows from select option
  
        if (maxRows == 5000) {
          $('.pagination-ing').hide();
        } else {
          $('.pagination-ing').show();
        }
  
        var totalRows = $(table + ' tbody tr').length; // numbers of rows
        $(table + ' tr:gt(0)').each(function() {
          // each TR in  table and not the header
          trnum++; // Start Counter
          if (trnum > maxRows) {
            // if tr number gt maxRows
  
            $(this).hide(); // fade it out
          }
          if (trnum <= maxRows) {
            $(this).show();
          } // else fade in Important in case if it ..
        }); //  was fade out to fade it in
        if (totalRows > maxRows) {
          // if tr total rows gt max rows option
          var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
          //	numbers of pages
          for (var i = 1; i <= pagenum; ) {
            // for each page append pagination-ing li
            $('.pagination-ing #prev1')
              .before(
                '<li data-page="' +
                  i +
                  '">\
                                    <span>' +
                  i++ +
                  '<span class="sr-only">(current)</span></span>\
                                  </li>'
              )
              .show();
          } // end for i
        } // end if row count > max rows
        $('.pagination-ing [data-page="1"]').addClass('active'); // add active class to the first li
        $('.pagination-ing li').on('click', function(evt) {
          // on click each page
          evt.stopImmediatePropagation();
          evt.preventDefault();
          var pageNum = $(this).attr('data-page'); // get it's number
  
          var maxRows = parseInt($('#maxRows1').val()); // get Max Rows from select option
  
          if (pageNum == 'prev') {
            if (lastPage == 1) {
              return;
            }
            pageNum = --lastPage;
          }
          if (pageNum == 'next') {
            if (lastPage == $('.pagination-ing li').length - 2) {
              return;
            }
            pageNum = ++lastPage;
          }
  
          lastPage = pageNum;
          var trIndex = 0; // reset tr counter
          $('.pagination-ing li').removeClass('active'); // remove active class from all li
          $('.pagination-ing [data-page="' + lastPage + '"]').addClass('active'); // add active class to the clicked
          // $(this).addClass('active');					// add active class to the clicked
            limitPagging();
          $(table + ' tr:gt(0)').each(function() {
            // each tr in table not the header
            trIndex++; // tr index counter
            // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
            if (
              trIndex > maxRows * pageNum ||
              trIndex <= maxRows * pageNum - maxRows
            ) {
              $(this).hide();
            } else {
              $(this).show();
            } //else fade in
          }); // end of for each tr in table
        }); // end of on click pagination-ing list
        limitPagging();
      })
      .val(5)
      .change();
  
    // end of on select change
  
    // END OF pagination-ing
  }
  
  function limitPagging(){
      // alert($('.pagination-ing li').length)
  
      if($('.pagination-ing li').length > 7 ){
              if( $('.pagination-ing li.active').attr('data-page') <= 3 ){
              $('.pagination-ing li:gt(5)').hide();
              $('.pagination-ing li:lt(5)').show();
              $('.pagination-ing [data-page="next"]').show();
          }if ($('.pagination-ing li.active').attr('data-page') > 3){
              $('.pagination-ing li:gt(0)').hide();
              $('.pagination-ing [data-page="next"]').show();
              for( let i = ( parseInt($('.pagination-ing li.active').attr('data-page'))  -2 )  ; i <= ( parseInt($('.pagination-ing li.active').attr('data-page'))  + 2 ) ; i++ ){
                  $('.pagination-ing [data-page="'+i+'"]').show();
  
              }
  
          }
      }
  }
  

 // fitre table gpl
   
  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } 
        else {
          tr[i].style.display = "none";
        }
      }   
         
    }
  }

// filtre table ing

   //****************** pagination table ing********************* */

   function myFunction1() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput1");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable1");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } 
        else {
          tr[i].style.display = "none";
        }
      }   
         
    }
  }
     


 
   
     
    