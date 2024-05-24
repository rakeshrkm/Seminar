<?php

namespace App\Helpers;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
*/

class ConstantHelper
{
    const PAID = 'Paid';
    const FREE = 'Free';


    //Occopations STATUS  status
    const UNEMPLOYED = 'Unemployed';
    const EMPLOYED = 'Employed';
    const BUSINESS = 'Business';
    const STUDENT = 'Student';
    const HOUSEWIFE = 'Housewife';
    const FORMER = 'Former';

    // highest qualification


    const INTERMEDIATE = 'Intermediate';
    const DIPLOMA = 'Diploma';
    const GRADUATION = 'Graduation';
    const POST_GRADUATION = 'Post Graduation';

     // highest qualification

    const MALE = 'Male';
    const FEMALE = 'Female';
    const OTHER = 'Other';

    // id type

    const AADHAR = 'Aadhar';
    const PAN = 'PAN';
    const VOTER_ID = 'Voter card';

    
    const GENDER = [self::MALE, self::FEMALE, self::OTHER];
    const OCCUPATIONS = [self::UNEMPLOYED, self::EMPLOYED, self::BUSINESS, self::STUDENT, self::HOUSEWIFE,self::FORMER];
    const PAYMENT_TYPE = [self::PAID, self::FREE];
    const HIGHEST_QUALIFICATION = [self::INTERMEDIATE, self::DIPLOMA, self::GRADUATION, self::POST_GRADUATION];
    const ID_TYPE = [self::AADHAR,self::PAN,self::VOTER_ID];
}
