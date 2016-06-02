<!-- Title and guide text  -->
<div>
  <h1>NCBI BioProjects (legumes)</h1>
  <span style="font-size: 85%">&nbsp;(List of 'BioProjects' at NCBI for LIS legume species. Includes 'Transcriptome/ Gene Expression' related and 'Variation' related data types among others.)</span>
</div>
<script  type="text/javascript"  src="/sites/all/modules/lis_ncbi_bioproj/lis_ncbi_bioproj.js"></script>
<script>
  var genus = "<?php echo $genus ?>";
  var method = "<?php echo $method ?>";
  var projectDataType = "<?php echo $project_data_type ?>";
</script>
<!-- -----------------------------------------------------------------------  -->

<div>
  <fieldset  style="display: inline-block; margin-top: 1px; margin-bottom: 10px">
    <form id="genus" action="">
      <b>&nbsp;Genus:&nbsp;&nbsp;</b>  
      <select  id="genus" onchange="FillDomElementWithBioprojHtml (this.options[this.selectedIndex].value, projectDataType, method, 'bioprojectList'); console.log('selected-option-value: ' + this.options[this.selectedIndex].value);">
          <option value="Fabaceae">  All Legumes (Fabaceae) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Apios">  Apios  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Arachis">  Arachis  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Cajanus">  Cajanus  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Chamaecrista">  Chamaecrista  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <option value="Cicer">  Cicer  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Glycine">  Glycine  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Lens culinaris">  Lens (culinaris) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Lotus japonicus">  Lotus (japonicus) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Lupinus">  Lupinus  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Medicago">  Medicago  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Phaseolus" selected="selected">  Phaseolus  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Pisum">  Pisum  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </option>          
          <option value="Trifolium">  Trifolium  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Vicia">  Vicia  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <option value="Vigna">  Vigna  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
      </select>
    </form>
    
    <form id="projectDataType"  action="">
      <b>&nbsp;Data Type:</b>&nbsp;&nbsp;
      <input type="radio" name="projectdatatype" value="All"  onclick="FillDomElementWithBioprojHtml (genus, this.value, method, 'bioprojectList');">&nbsp;&nbsp;All &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="radio" name="projectdatatype" value='GeneExp'  checked="checked"  onclick="FillDomElementWithBioprojHtml (genus, this.value, method, 'bioprojectList');">&nbsp;&nbsp;Transcriptome/Gene Expression&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="radio" name="projectdatatype" value='Variation'    onclick="FillDomElementWithBioprojHtml (genus, this.value, method, 'bioprojectList');">&nbsp;&nbsp;Variation&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </form>
    
    <fieldset style="margin-left: 100px;margin-top: 5px;margin-bottom: 5px;margin-right: 100px">
      <form id="method"  action="">
              <b>&nbsp;Method:</b>&nbsp;&nbsp;
              <input type="radio" name="method" value="All"  onclick="FillDomElementWithBioprojHtml (genus, projectDataType, this.value, 'bioprojectList');">&nbsp;&nbsp;All &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" name="method" value="Array"  onclick="FillDomElementWithBioprojHtml (genus, projectDataType, this.value, 'bioprojectList');">&nbsp;&nbsp;Array&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" name="method" value="Sequencing"  checked="checked"  onclick="FillDomElementWithBioprojHtml (genus, projectDataType, this.value, 'bioprojectList');">&nbsp;&nbsp;Sequencing&nbsp;&nbsp;
      </form>
    </fieldset>
  </fieldset>
</div>
    


<script>
  //For initial page loading before user interaction
FillDomElementWithBioprojHtml (genus, projectDataType, method, 'bioprojectList');
</script> 
<!--  ---------------------------------------------------------------------   -->
<hr/>

<div id="bioprojectList">
  
  <span style='font-size:1.5em;color:#999999'>DIV for BioProj data  ...   ...   ...</span>
  
</div>


<!-- SCRATCH PAD  -->

