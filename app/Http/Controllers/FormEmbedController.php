<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Form;

class FormEmbedController extends Controller
{
    /**
     * Return js code to write HTML to client page.
     *
     * @param Request $request
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function js( Request $request )
    {
        if ( !count($request->query()) ) return "Not found";
        $form = Form::find($request->id);

        $failedMessage = "console.log('Not found form with id "
        .$request->id
        ." plase check your emded code or contact admin getaco.com.');";

        if ( $form ) {
            $setting  = json_decode($form->setting);
            $contents = view('embed.form',compact('form', 'setting'));
            return response( $contents )->header('Content-Type', 'application/javascript');
        }
        return response($failedMessage, 200)
                ->header('Content-Type', 'application/javascript');
    }

}
