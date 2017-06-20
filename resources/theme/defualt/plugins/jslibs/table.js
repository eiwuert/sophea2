/************************** Define Global Variable ************************************/
var tableId = '';
var tableClass = '';
var tableId = '';
var thead = '';
var theadClass = ''
var theadId = ''
var tbody = '';
var tbodyClass = '';
var tbodyId = '';
var th = '';
var thClass = '';
var thId = '';
var thText = '';
var td = '';
var tdClass = '';
var tdId = '';
var tdText = '';
var colspans = '';
var trClass = '';

/************************** Define Setter Getter ************************************/
function setTHeadClass(cls = ''){
	theadClass += cls;
}
function getTHeadClass(){
	return theadClass;
}
function setTHeadId(ids = ''){
	theadId = ids;
}
function getTHeadId(){
	return theadId;
}
function startTHead(){
	var classes = '';
	var idss = '';
	if (getTHeadClass() != ''){
		classes = 'class="'+ getTHeadClass() +'"';
	}
	if (getTHeadId() != ''){
		idss = 'id="' + getTHeadId() + '"';
	}
	return '<thead ' + idss + ' ' + classes + '>';
}
function stopTHead(){
	return '<thead>';
}
function getThead(){
	return startTHead() + startTr() + getTh()  + stopTr() + stopTHead();
}

function setTBodyClass(cls = ''){
	tbodyClass += cls;
}
function getTBodyClass(){
	return tbodyClass;
}
function setTBodyId(ids = ''){
	tbodyId = ids;
}
function getTBodyId(){
	return tbodyId;
}
function startTBody(){
	var classes = '';
	var idss = '';
	if (getTBodyClass() != ''){
		classes = ' class="'+ getTHeadClass() +'" ';
	}
	if (getTBodyId() != ''){
		idss = ' id="' + getTHeadId() + '" ';
	}
	return '<tbody ' + classes + ' ' + idss + '>';
}
function stopTBody(){
	return '</tbody>';
}
function getTbody(){
	return startTBody() + getTd() + stopTBody();
}


function setTHClass(cls = ''){
	thClass += cls;
}
function getTHClass(){
	return thClass;
}
function setTHText(text = ''){
	thText = text;
}
function getTHText(){
	return thText;
}
function startTH(){
	var classes = '';
	if (getTHClass() != ''){
		classes = 'class="'+ getTHClass() +'"';
	}
	return '<th ' + classes + '>';
}
function stopTH(){
	return '</th>';
}
function setTh(text = ''){
	setTHText(text);
	th += startTH() + getTHText() + stopTH();
}
function getTh(){
	return th;
}


function setTDClass(cls = ''){
	tdClass += cls;
}
function getTDClass(){
	return tdClass;
}
function setTDText(text = ''){
	tdText = text;
}
function getTDText(){
	return tdText;
}
function startTD(){
	var classes = '';
	var colspan = '';
	if (getTHClass() != ''){
		classes = 'class="'+ getTHClass() +'"';
	}
	if(getColSpans() != ''){
	    colspan = ' colspan="'+getColSpans()+'"';
	}
	return '<td ' + classes + ' ' + colspan + '>';
}
function stopTD(){
	return '</td>';
}
function setTd(text = ''){
	setTDText(text);
	td += startTD() + getTDText() + stopTD();
}
function getTd(){
	return td;
}

function setTrClass(str = ''){
    trClass = str;
}
function getTrClass(){
    return trClass;
}
function startTr(){
	return '<tr>';
}
function stopTr(){
	return '</tr>';
}
function startTrTd(){
	td += '<tr>';
}
function stopTrTd(){
	td += '</tr>';
}

function setTableClass(cls = ''){
	tableClass += cls;
}
function getTableClass(){
	return tableClass;
}
function setTableId(ids = ''){
	tableId = ids;
}
function getTableId(){
	return tableId;
}
function startTable(){
	return '<table class="' + getTableClass() + '" id="' + getTableId() + '">';
}
function stopTable(){
	return '</table>';
}

function setColSpans(ids = ''){
    colspans = ids;
}
function getColSpans(){
    return colspans;
}

/************************** Table View And Return *********************/
function getTable(){
	var tables = startTable() + getThead() + getTbody() + stopTable();
	clearProperty();
	return tables;
}
function viewTable(ids){
	$('#'+ids).html(startTable() + getThead() + getTbody() + stopTable());
	clearProperty();
}
function viewRows(ids){
	$('#'+ids).html(getTd());
	clearProperty();
}
function appendRows(ids){
	$('#'+ids).append(getTd());
	clearProperty();
}
/**************************** Clear Property *****************************/
function clearProperty(){
	table = '';
	tableClass = '';
	thead = '';
	theadClass = '';
	tbody = '';
	tbodyClass = '';
	th = '';
	thClass = '';
	td = '';
	tdClass = '';
	colspans = '';
}
