<?php

/**
 * Web File Manager controller.
 *
 * @category   Apps
 * @package    Web_File_Manager
 * @subpackage Controllers
 * @author     Your name <your@e-mail>
 * @copyright  2013 Your name / Company
 * @license    Your license
 */

///////////////////////////////////////////////////////////////////////////////
// Load dependencies
///////////////////////////////////////////////////////////////////////////////

$this->lang->load('Web_File_Manager');

///////////////////////////////////////////////////////////////////////////////
// Form
///////////////////////////////////////////////////////////////////////////////
//echo infobox_highlight(lang('Web_File_Manager_app_name'), '...');
?>
<div class="row">
<nav class="navbar navbar-default ">
    <div class="container col-sm-12">
        <div class="btn-group col-sm-3" style="margin-top: 7px;" role="group" aria-label="...">
            <button id=btnMoz type="button" class="btn btn-default btn-md active" style="height: 35px;" aria-label="Left Align">
                <span class="fa fa-th" aria-hidden="true"></span>
            </button>
            <button id="btnList" type="button" class="btn btn-default btn-md" style="height: 35px;" aria-label="Left Align">
                <span class="fa fa-th-list" aria-hidden="true"></span>
            </button>
        </div>
        <div class="btn-group col-sm-5" style="margin-top: 7px;" role="group" aria-label="...">
            <button type="button" data-toggle="tooltip" data-placement="bottom" title="Copier" class="btn btn-default btn-md" style="height: 35px;" aria-label="Left Align">
                <span class="fa fa-files-o " aria-hidden="true"></span>
            </button>
            <button  type="button" data-toggle="tooltip" data-placement="bottom" title="Couper" class="btn btn-default btn-md" style="height: 35px;" aria-label="Left Align">
                <span class="fa fa-scissors" aria-hidden="true"></span>
            </button>
            <button type="button" data-toggle="tooltip" data-placement="bottom" title="Coller" class="btn btn-default btn-md" style="height: 35px;" aria-label="Left Align">
                <span class="fa fa-clone" aria-hidden="true"></span>
            </button>
        </div>
        <form class="navbar-form right" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Recherche</button>
        </form>
        
    </div>
    <p style="margin-left: 30px;">Chemin : <a href="#">/</a><a href="#">home</a> /<a href="#">Bush</a> </p>
</nav>
</div>
<div class="row" >
    <div class="col-sm-12" >
        <div style="" class="btn-group col-sm-2">
            <div class="btn-group-vertical">
                <button type="button" class="btn btn-default">Bureau</button>
                <button type="button" class="btn btn-default">Document</button>
                <button type="button" class="btn btn-default">Image</button>
                <button type="button" class="btn btn-default">Videos</button>
                <button type="button" class="btn btn-default">Télechargement</button>
            </div>
        </div>
        <div class="col-sm-10" id="tab" style="display:none">
            <h1 id="nodata" for="" style="color: gray;text-align: center;display:none">Dossier vide</h1>
            <table  class="table table-hover" id="table" >
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Modifier le </th>
                        <th scope="col">Type</th>
                        <th scope="col">Taille</th>
                    </tr>
                </thead>
                <tbody id="tab1">
                   <!-- <tr style="cursor:pointer;">
                        <td><input type="checkbox" name="" id=""></td>
                        <td scope="row"><img src="<?echo base_url('Web_File_Manager'); ?>/assets/img/ext/apk.png" style="width: 20px;" alt="..."></td>
                        <td>Test.html</td>
                        <td>12/12/2018</td>
                        <td>Fichier HTML</td>
                        <td>128 Ko</td>
                    </tr>-->
                </tbody>
                    
            </table>
        </div>
        <div class="col-sm-10" id="moz" style=""  >
        <h1 id="nodata" for="" style="color: gray;text-align: center;display:none">Dossier vide</h1>
        
        <!--<div class="thumbnail col-sm-2" style="margin-right: 10px;cursor: pointer; height:140px;">
            <input type="checkbox" value="">
            <img src="<?echo base_url('Web_File_Manager'); ?>/assets/img/ext/apk.png" style="width: 50px;" alt="...">
            <div class="caption">
                <p style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis; text-align:center;">test.apk</p>
            </div>
        </div>-->
            
        </div>
    </div>
</div>
<script src="<?php echo base_url('Web_File_Manager'); ?>/assets/js/File.js"></script>
<script src="<?php echo base_url('Web_File_Manager'); ?>/assets/js/Disposition.js"></script>




