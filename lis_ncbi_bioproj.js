/*
JS functions for the lis_ncbi_bioproj module
*/

/*
 *Sudhansu Dash
 *Apr-26-2016
 *
 */

/* TODO:
 *
 */

//INFO: ((Phaseolus[Organism]) AND ("Transcriptome or Gene expression"[Project Data Type]))


function makeHtmlFromBioprojEsummaryJson(esummaryJson) {  //NOT DONE YET winProgress
    //Given a jsonObj from eSummary, generates html <li> for display of Docsummary
    //The jsonOBj could be for one or multiple eSummaries
    // jsonObj passed from jQuery.get(url, f())

    //USAGE:
    //domElementIdHtml += makeHtmlFromEsummaryJson(esummaryJson);
    
    
    //TO DO  Take code from getDocSumAttributesFromJson (id)
    var esummaryResult = esummaryJson.result;  //main json obj containing uids list and summary for each uid
    var uidsList = esummaryResult.uids;  // array of all uids in the jsonObj from eSummary
      //(.result.uids is from the ncbi esummary json)
      //console.log("uidsList: " + uidsList.join()); //debug
    
    bioprojects_html ="";
    
    uidsList.forEach(function(uid) {
        //Go through each uid and extract the attributes to make html
        //console.log("for-each: " + uid); //debug
        
        //From ncbi
        var taxid = esummaryResult[uid]['taxid']; //console.log(taxid);
        var project_id = esummaryResult[uid]['project_id']; //console.log(project_id);
        var project_acc = esummaryResult[uid]['project_acc']; //console.log(project_acc);
        var project_data_type = esummaryResult[uid]['project_data_type']; //console.log(project_data_type);
        var project_target_material = esummaryResult[uid]['project_target_material']; //console.log(project_target_material);
        var project_name = esummaryResult[uid]['project_name']; //console.log(project_name);
        var project_title = esummaryResult[uid]['project_title']; //console.log(project_title);
        var project_description = esummaryResult[uid]['project_description']; //console.log(project_description);
        var organism_name = esummaryResult[uid]['organism_name']; //console.log(organism_name);
        var project_methodtype = esummaryResult[uid]['project_methodtype']; //console.log("project_methodtype" + project_methodtype);
        var project_target_material = esummaryResult[uid]['project_target_material']; //console.log(project_target_material);
        
        //link to ncbi bioproj with proj id        
        var bioproj_ncbi_link = "<a  "
                + "href=\"https://www.ncbi.nlm.nih.gov/bioproject/" + project_id + "\" "
                + " target=_blank" + ">" + project_acc + "</a>"; //288189;
        
        //The display line
        var bioproj = "<b>"
            + bioproj_ncbi_link + ": " + "</b>"
            + project_title
            + " <b>(</b>" + project_data_type + "; "+project_methodtype + "<b>)</b>";
        
        //var more_details = "<a id='collapseLink'  onclick=\"(function($) { $(document).ready(function(){$(this).next('fieldset').toggle('5000'); $('#collapseLink').text(($('#collapseLink').text() == '...less') ? '>[...more]' : '...less');}); })(jQuery);\" "
        //    + ">[...more]</a>" 
        //
        //
        //+ "<fieldset id='details'  style='display: none;background-color: #EFEFEF'> <!-- Collapsible fieldset -->"
        //+ project_name + "<br/>" + project_description
        //+ "</fieldset>";
  /*$('fieldset#details').toggle('5000');*/
        
        //Details in collapsible section
        var more_details = "<a onclick=\"jQuery(this).next('fieldset').toggle();\">&nbsp;&nbsp;Details <b>[&plusmn;]</b></a>"
            + "<fieldset id='details'  style='display:none;background-color: #EFEFEF'>"
            + "<b>Project name:</b> " + project_name + "<br/>"
            + " (" + "<b>Organism:</b> " + "<i>" + organism_name + "</i>" + "; "
            + "<b>Project type:</b> " + project_data_type + "; "
            + "<b>Method:</b> " + project_methodtype + "; "
            + "<b>Target material:</b> " + project_target_material
            + ")." + "<br/>"
            + "<b>Project description:</b><br/> " + project_description
            + "</fieldset>";
        //console.log("more_details:"+more_details);
  

        var bioproj_li = "<li>" + bioproj + more_details + "</li><br/>";                
        
        bioprojects_html += bioproj_li;
        
        
    })  //uidsList.forEach
    
    //console.log("bioprojects_html: " + bioprojects_html); //debug
    return bioprojects_html; // Returns XMLHttpRequest {}
        
}  //function makeHtmlFromEsummaryJson(EsummaryJson)




//The main function
//=================



function FillDomElementWithBioprojHtml (genus, projectDataType, method, domElementId) {
    // Formatting in the console for easy visibility
    console.log('\n' + '**** ' + new Date().toLocaleString() + ' ****'); 
    
    var message = "";
    var messageInitial = "<span style='font-size:1.5em;color:#999999'>Please wait: Gettting data from Pubmed ...   ...   ...</span>";
    //Show intial message
    jQuery("#" + domElementId).html (messageInitial);
    
    //Get the selected genus and method from form
    projectDataType = jQuery("form#projectDataType  input:checked").val();
    genus = jQuery("form#genus  option:selected").val();
    method = jQuery("form#method  input:checked").val();
       
    console.log("projectDataType: " + projectDataType); //debug
    console.log("genus: " + genus); //debug
    console.log("method: " + method); //debug
     
    
    
    //Set up htmlContent
    var htmlContent = "";
    
    //Construct Esearch URL
    //https://eutils.ncbi.nlm.nih.gov/entrez/eutils/esearch.fcgi?db=bioproject&retmode=json&term=(Arachis[Organism]) AND (\"Transcriptome or Gene expression\"[Project Data Type])&retmax=10000;
    
//https://www.ncbi.nlm.nih.gov/bioproject/279009  //links to the specific bioproj
    var BaseUrlEsearch = "https:" + "//eutils.ncbi.nlm.nih.gov/entrez/eutils/esearch.fcgi?" + "db=bioproject" + "&retmode=json" + "&retmax=10000";
    
    var termOrganism = "(" + genus + "[Organism])";
    var termMethod = "(" + "\"method " +  method +"\"[Properties])";
    var termProjectDataType = '';
    
    switch (projectDataType) {
        case 'All':
            termProjectDataType = '';
            break;
        case 'GeneExp':
            termProjectDataType = "+AND+(\"Transcriptome+or+Gene+expression\"[Project+Data+Type])";
            break;
        case 'Variation':
            termProjectDataType = "+AND+(\"variation\"[Project+Data+Type])";
            break;
    }
    
    
    //>>>>>>>>>>>>>>>>>>>>>>
    //for projectDataType:
    //original//var query = "";
    
    query = "&term=" + termOrganism + termProjectDataType;
    
    if (method != "All") {
        query = query + "+AND+" + termMethod;
    } else {
        query = query;
        
    }
    
    
    var UrlEsearch = BaseUrlEsearch + query; //returns json obj
    
    //console.log("UrlEsearch: " + UrlEsearch); 
    
    //
    
    jQuery.get(UrlEsearch,status, function(esearchJson){
    //jQuery.post(UrlEsearch,status, function(esearchJson){
        
        //bioproj id counts from Esearch
        var esearchCount = esearchJson.esearchresult.count;
        
        //Message while waiting 'No of items found'
        message = "<i>" + "Found " + "<b>" + esearchCount + " projects" + "</b>" + " at NCBI " + "for " + genus + "</i><br/><br/>";// + " and " + projectDataType + " data type " + " with " + "method, " + "'" + method + "'" + ". " + "</b>" + "<br/><br/>";
        //jQuery("#" + domElementId).html (message);
        var esearchRetmax = esearchJson.esearchresult.retmax;
        console.log ("esearchCount: " + esearchCount + "; esearchRetmax: " + esearchRetmax); //debug
        
        //bioproj id list from Esearch
        var esearchIdlist = esearchJson.esearchresult.idlist;
        //console.log ("esearchIdlist: " + esearchIdlist.join() ); //debug
        
        jQuery("#" + domElementId).html (message);
        //jQuery("#" + domElementId).html ("esearchIdlist: " + esearchIdlist.join());
        
        var esummaryUrl = "https://eutils.ncbi.nlm.nih.gov/entrez/eutils/esummary.fcgi?db=bioproject&retmode=json" + "&id="
            + esearchIdlist.join();
        //console.log("esummaryUrl: " + esummaryUrl); //debug
        
        jQuery.get(esummaryUrl,status, function(esummaryJson){
            
            htmlContent += message;
            htmlContent += makeHtmlFromBioprojEsummaryJson(esummaryJson);
            
            jQuery("#" + domElementId).html (htmlContent);
        
         })  //jQuery.get(esummaryUrl,status, function(esummaryJson)
        
        
    }) //jQ.get(UrlESearch.......)
    
    
} // fn FillDomElementWithBioprojHtml


//--------  SCRATCH PAD  ----------

/*
("method sequencing"[Properties] AND ("Glycine"[Organism])) AND "Transcriptome or Gene expression"[Project Data Type]
*/

/*
 *
 *var selectedValues = $('#multipleSelect').val();
 *
 *var values = $('#select-meal-type').val();
 *
 *$('#select-meal-type :selected') will contain an array of all of the selected items.
 *$('#select-meal-type option:selected').each(function() {
    alert($(this).val());
});
 */
