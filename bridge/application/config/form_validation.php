<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$config = array(
        'generals/login/validate_login'      => array(
                                                    array(
                                                        'field'     => 'email',
                                                        'label'     => '{email}',
                                                        'rules'     => 'required|valid_email'
                                                    ),
                                                    array(
                                                        'field'     => 'psw',
                                                        'label'     => '{password}',
                                                        'rules'     => 'required'
                                                    )
        ),
);
