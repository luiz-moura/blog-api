<?php

use App\Models\CompanyModel;
use Config\Services;

function sendEmail($to, $subject, $message) : bool
{
  try
  {
    $companyModel = new CompanyModel();
    $company = $companyModel->first();

    $email = \Config\Services::email();
    $email->setTo($to);
    $email->setFrom($company->email, $company->name);
    $email->setSubject($subject);
    $email->setMessage($message);
    $email->send();

    return true;
  }
  catch (Expection $e)
  {
    return false;
  }
}
