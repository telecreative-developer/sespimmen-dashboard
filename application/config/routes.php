<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'SespimLogin';
$route['login'] = 'SespimLogin/login';


//Route Dashboard
$route['dashboard']          = 'Sespim/dashboard';

// Route Events
$route['events']             = 'Sespim/events';
$route['addevents']          = 'Sespim/addevents';
$route['insertEvents']       = 'Sespim/insertEvents';
$route['editevents/:any']    = 'Sespim/editEvents';
$route['updateEvents/:any']  = 'Sespim/updateEvents';
$route['deleteEvents/:any']  = 'Sespim/deleteEvents';

// Route Documents
$route['documents']              = 'Sespim/documents';
$route['add_documents']          = 'Sespim/add_documents';
$route['insert_documents']       = 'Sespim/insert_documents';
$route['edit_documents/:any']    = 'Sespim/edit_documents';
$route['update_documents/:any']  = 'Sespim/update_documents';
$route['delete_documents/:any']  = 'Sespim/delete_documents';

// Route posts
$route['posts']                = 'Sespim/posts';
$route['deletePosts/:any']     = 'Sespim/deletePosts';

// Route Interviewees
$route['interviewees']                = 'Sespim/interviewees';
$route['addinterviewees']             = 'Sespim/addinterviewees';
$route['insertInterviewees']          = 'Sespim/insertInterviewees';
$route['editinterviewees/:any']       = 'Sespim/editinterviewees';
$route['updateInterviewees/:any']     = 'Sespim/updateinterviewees';
$route['deleteInterviewees/:any']     = 'Sespim/deleteInterviewees';

// Route banner
$route['banner']                = 'Sespim/banner';
$route['addbanner']             = 'Sespim/addbanner';
$route['insert_banner']         = 'Sespim/insertbanner';
$route['editbanner/:any']       = 'Sespim/editbanner';
$route['updatebanner/:any']     = 'Sespim/updatebanner';
$route['delete_banner/:any']    = 'Sespim/delete_banner';

//Route Announcement
$route['announcement']                = 'Sespim/announcement';
$route['addannouncement']             = 'Sespim/addannouncement';
$route['insert_announcement']         = 'Sespim/insertannouncement';
$route['edit_announcement/:any']      = 'Sespim/editannouncement';
$route['update_announcement/:any']    = 'Sespim/updateannouncement';
$route['delete_announcement/:any']    = 'Sespim/delete_announcement';

// Route Users
$route['users']                = 'Sespim/users';
$route['pagesprofile/:any']    = 'Sespim/pagesprofile';
$route['addusers']             = 'Sespim/addusers';
$route['verifyUsers/:any']     = 'Sespim/verifyUsers';
$route['deleteUsers/:any']     = 'Sespim/deleteUsers';

// Route Admin
$route['admin']                = 'Sespim/admin';
$route['addAdmin']             = 'Sespim/addAdmin';
$route['insertAdmin']          = 'Sespim/insertAdmin';
$route['deleteAdmin/:any']     = 'Sespim/deleteAdmin';

// Route Scores
$route['scores']             = 'Sespim/scores';
$route['addscores']          = 'Sespim/addscores';
$route['insertscores']       = 'Sespim/insertscores';
$route['editscores/:any']    = 'Sespim/editScores';
$route['updateScores/:any']  = 'Sespim/updateScores';
$route['deleteScores/:any']  = 'Sespim/deleteScores';

$route['publish_scores/:any']   = 'Sespim/publish_scores';
$route['unpublish_scores/:any']   = 'Sespim/unpublish_scores';

// Academic
$route['academic']                  = 'SespimScores/academic';
$route['addacademic']               = 'SespimScores/addacademic';
$route['insertacademic']            = 'SespimScores/insertacademic';
$route['editacademic/:any']         = 'SespimScores/editacademic';
$route['update_academic/:any']      = 'SespimScores/update_academic';
$route['deleteAkademik/:any']       = 'SespimScores/deleteAkademik';
$route['publish_academic/:any']     = 'SespimScores/publish_academic';
$route['unpublish_academic/:any']   = 'SespimScores/unpublish_academic';

// Kepribadian
$route['kepribadian']                  = 'SespimScores/kepribadian';
$route['addkepribadian']               = 'SespimScores/addkepribadian';
$route['insertkepribadian']            = 'SespimScores/insertkepribadian';
$route['editkepribadian/:any']         = 'SespimScores/editkepribadian';
$route['update_kepribadian/:any']      = 'SespimScores/update_kepribadian';
$route['deleteKepribadian/:any']       = 'SespimScores/deleteKepribadian';
$route['publish_kepribadian/:any']     = 'SespimScores/publish_kepribadian';
$route['unpublish_kepribadian/:any']   = 'SespimScores/unpublish_kepribadian';


// Kegiatan Khusus
$route['kegiatan_khusus']                 = 'SespimScores/kegiatan_khusus';
$route['addkegiatan_khusus']              = 'SespimScores/addkegiatan_khusus';
$route['insertkegiatan_khusus']           = 'SespimScores/insertkegiatan_khusus';
$route['editkegiatan_khusus/:any']        = 'SespimScores/editkegiatan_khusus';
$route['update_kegiatan_khusus/:any']     = 'SespimScores/update_kegiatan_khusus';
$route['deletekegiatan_khusus/:any']      = 'SespimScores/deletekegiatan_khusus';
$route['publish_kegiatan_khusus/:any']    = 'SespimScores/publish_kegiatan_khusus';
$route['unpublish_kegiatan_khusus/:any']  = 'SespimScores/unpublish_kegiatan_khusus';


// Kesehatan Jasmani
$route['kesehatan_jasmani']               = 'SespimScores/kesehatan_jasmani';
$route['addkesehatan']                    = 'SespimScores/addkesehatan_jasmani';
$route['insertkesehatan']                 = 'SespimScores/insertkesehatan';
$route['editkesehatan/:any']              = 'SespimScores/editkesehatan';
$route['update_kesehatan/:any']           = 'SespimScores/update_kesehatan';
$route['deleteKesehatan/:any']            = 'SespimScores/deleteKesehatan';
$route['publish_kesehatan/:any']     = 'SespimScores/publish_kesehatan';
$route['unpublish_kesehatan/:any']   = 'SespimScores/unpublish_kesehatan';

// Gabungan
$route['gabungan']                  = 'SespimScores/gabungan';
$route['addgabungan']               = 'SespimScores/addgabungan';
$route['insertgabungan']            = 'SespimScores/insertgabungan';
$route['editgabungan/:any']         = 'SespimScores/editgabungan';
$route['update_gabungan/:any']      = 'SespimScores/update_gabungan';
$route['deletegabungan/:any']       = 'SespimScores/deleteGabungan';
$route['publish_gabungan/:any']     = 'SespimScores/publish_gabungan';
$route['unpublish_gabungan/:any']   = 'SespimScores/unpublish_gabungan';

// Route All Random
$route['teams']              = 'Sespim/teams';
$route['topics']             = 'Sespim/topics';
$route['insertTopics']       = 'Sespim/insertTopics';
$route['deleteTopics/:any']  = 'Sespim/deleteTopics';
$route['insertTeams']        = 'Sespim/insertTeams';
$route['deleteTeams/:any']   = 'Sespim/deleteTeams';
$route['kodenaskah']         = 'Sespim/kodenaskah';
$route['insertKode']         = 'Sespim/insertKode';
$route['deleteKode/:any']    = 'Sespim/deleteKode';
$route['exam']               = 'Sespim/exam';
$route['add_exam']           = 'Sespim/add_exam';
$route['edit_exam/:any']     = 'Sespim/edit_exam';
$route['update_exam/:any']   = 'Sespim/update_exam';
$route['delete_exam/:any']   = 'Sespim/delete_exam';
$route['publish_exam/:any']   = 'Sespim/publish_exam';
$route['unpublish_exam/:any']   = 'Sespim/unpublish_exam';

$route['insertexam']         = 'Sespim/insertexam';
$route['insertPok_uji']      = 'Sespim/insertPok_uji';
$route['deletePok_uji/:any'] = 'Sespim/deletePok_uji';


//Content
$route['pagesposts/:any']    = 'Sespim/pagesposts';


$route['mypdf'] = "Sespim/mypdf";
$route['logout'] = 'Sespim/logout';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
