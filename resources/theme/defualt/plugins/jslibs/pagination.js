/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var pageStart = 0;
var pageStartTop = 0;
/* ============== Setter & Getter ===================== */

function setPageStartTop(values){
    pageStartTop = values;
}
function getPageStartTop(){
    return pageStartTop;
}

function setPageStart(values){
    pageStart = values;
}
function getPageStart(){
    return pageStart;
}

/* ============== Function ============================ */
/* Jquery Pagination */
function pagination(ids,totals,limits){

	/* Past Variable from Controller [totalRecord, Item Per Page] */

	var totalPage = Math.ceil(parseInt(totals)/parseInt(limits));

	//alert(totalPage);
	if(parseInt(totals) > parseInt(limits)){
		var atId = '';
		if(ids == null || ids == ''){
			ids = 'pg1';
		}else if(ids == 'pg0'){
			atId = $('#pg1').text();
			$('#pg1').text(parseInt(atId)-1);
			$('#pg2').text(atId);
			$('#pg3').text(parseInt(atId)+1);
		}else if(ids == 'pg4'){
			atId = $('#pg1').text();
			$('#pg1').text(parseInt(atId)+1);
			$('#pg2').text(parseInt(atId)+2);
			$('#pg3').text(parseInt(atId)+3);
		}else{
			atId = $("#"+ids+"").text();

			if((parseInt(totalPage) - parseInt(atId)) <= 2){
				if((parseInt(totalPage) - parseInt(atId)) == 2){
					$('#pg2').removeClass('pg-active');
					$('#pg3').removeClass('pg-active');
					$('#pg1').addClass('pg-active');
				}else if((parseInt(totalPage) - parseInt(atId)) == 1){
					$('#pg1').removeClass('pg-active');
					$('#pg3').removeClass('pg-active');
					$('#pg2').addClass('pg-active');
				}else if((parseInt(totalPage) - parseInt(atId)) == 0){
					$('#pg1').removeClass('pg-active');
					$('#pg2').removeClass('pg-active');
					$('#pg3').addClass('pg-active');				
				}else{
					atId = $("#"+ids+"").text();
				}

				$('#pg1').text(parseInt(totalPage) - 2);
				$('#pg2').text(parseInt(totalPage) - 1);
				$('#pg3').text(totalPage);
			}else{
				$('#pg1').text(atId);
				$('#pg2').text(parseInt(atId)+1);
				$('#pg3').text(parseInt(atId)+2);
			}
		}

		var pdno = $('.pg-active').text();
		if(parseInt(pdno) == 1){
			$('#pg0').css('display','none');
		}else if(parseInt(pdno) > 1){
			$('#pg0').css('display','block');

			if((parseInt(totalPage) - parseInt(pdno)) <= 2){
				$('#pg4').css('display','none');			
			}else{
				$('#pg4').css('display','block');
			}
		}
		if(parseInt(getPageStartTop()) > 0){
			setPageStart(0);
		}else{
			setPageStart((parseInt(pdno) - 1) * parseInt(limits));
			setPageStartTop(getPageStart());
		}

	}else{
		$('#pg0').css('display','none');
		$('#pg1').css('display','none');
		$('#pg2').css('display','none');
		$('#pg3').css('display','none');
		$('#pg4').css('display','none');
	}
	
}

