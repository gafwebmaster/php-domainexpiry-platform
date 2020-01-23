<?php

class Domains extends Controller {

    public function __construct() {
        if (!isLoggedIn()) {
            redirect('logins');
        }
        $this->domainModel = $this->model('Domain');
    }

    //The default domains homepage that list the domains
    public function index() {
        $theDomains = $this->domainModel->getList();
        $data = [
            'metatitle' => 'Domain list',
            'domains' => $theDomains
        ];
        $this->view('pages/domainslist', $data);
    }

    //Blacklist domains
    public function blacklist() {
        $theBlacklist = $this->domainModel->getBlacklist();
        $data = [
            'metatitle' => 'Black list',
            'blacklist' => $theBlacklist
        ];
        $this->view('pages/domainsblacklist', $data);
    }

    //Add a new domains    
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize the post
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'metatitle' => 'Add a domain',
                'domain' => trim($_POST['domain']),
                'hostExpiry' => trim($_POST['hostExpiry']),
                'domainExpiry' => trim($_POST['domainExpiry']),
                'customerName' => trim($_POST['customerName']),
                'hostingCompany' => trim($_POST['hostingCompany']),
                'otherDetails' => trim($_POST['otherDetails']),
                'domain_err' => '',
                'hostExpiry_err' => '',
                'domainExpiry_err' => '',
                'customerName_err' => '',
                'hostingCompany_err' => '',
                'otherDetails_err' => ''
            ];

            //Validate the domain
            if (empty($data['domain'])) {
                $data['domain_err'] = 'Please enter the domain';
            }

            //Validate host expiry date
            if (empty($data['hostExpiry'])) {
                $data['hostExpiry_err'] = 'Please enter the hosting expiry date';
            }

            //Validate domain expiry date
            if (empty($data['domainExpiry'])) {
                $data['hostExpiry_err'] = 'Please enter the domain expirity date';
            }

            //Validate customer name
            if (empty($data['customerName'])) {
                $data['customerName_err'] = 'Please enter customer name';
            }

            //Validate hosting company
            if (empty($data['hostingCompany'])) {
                $data['hostingCompany_err'] = 'Please enter hosting company';
            }

            //Validate other details
            if (empty($data['otherDetails'])) {
                $data['otherDetails_err'] = 'Please enter details';
            }

            //Make sure not errors
            if (empty($data['domain_err']) && empty($data['customerName_err']) && empty($data['hostingCompany_err']) && empty($data['otherDetails_err']) && empty($data['domainExpiry_err']) && empty($data['hostExpiry_err'])) {
                //Validated
                if ($this->domainModel->addDomain($data)) {
                    flash('domain_added', 'Domain added');
                    redirect('domains');
                } else {
                    die('Something went wrong');
                }
            } else {
                //Load the view with errors
                $this->view('pages/domainsadd', $data);
            }
        } else {
            $data = [
                'metatitle' => 'Add a domain',
                'domain' => '',
                'hostExpiry' => '',
                'domainExpiry' => '',
                'customerName' => '',
                'hostingCompany' => '',
                'otherDetails' => ''
            ];
            $this->view('pages/domainsadd', $data);
        }
    }

    //Remove blacklist domain
    public function removeblacklist($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'ressettedAtempts' => 0
            ];
            $ressetted = $this->domainModel->ressetIp($id);

            //$this->view('pages/domainsremoveblacklist', $data);
            if ($ressetted) {
                flash('remove_blacklist', 'The IP was removed');
                redirect('domains/blacklist');
            }
        } else {
            redirect('domains/blacklist');
        }
    }

    public function updateDomain($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'domain' => trim($_POST['domain']),
                'customerName' => trim($_POST['customerName']),
                'hostingCompany' => trim($_POST['hostingCompany']),
                'otherDetails' => trim($_POST['otherDetails']),
                'hostExpiry' => trim($_POST['hostExpiry']),
                'domainExpiry' => trim($_POST['domainExpiry']),
                'domain_err' => '',
                'customerName_err' => '',
                'hostingCompany_err' => '',
                'otherDetails_err' => '',
                'hostExpiry_err' => '',
                'domainExpiry_err' => ''
            ];

            //Validate the domain
            if (empty($data['domain'])) {
                $data['domain_err'] = 'Please enter the domain';
            }

            //Validate host expiry date
            if (empty($data['hostExpiry'])) {
                $data['hostExpiry_err'] = 'Please enter the hosting expiry date';
            }

            //Validate domain expiry date
            if (empty($data['domainExpiry'])) {
                $data['hostExpiry_err'] = 'Please enter the domain expirity date';
            }

            //Validate customer name
            if (empty($data['customerName'])) {
                $data['customerName_err'] = 'Please enter customer name';
            }

            //Validate hosting company
            if (empty($data['hostingCompany'])) {
                $data['hostingCompany_err'] = 'Please enter hosting company';
            }

            //Validate other details
            if (empty($data['otherDetails'])) {
                $data['otherDetails_err'] = 'Please enter details';
            }

            //Make sure not errors
            if (empty($data['domain_err']) && empty($data['customerName_err']) && empty($data['hostingCompany_err']) && empty($data['otherDetails_err']) && empty($data['domainExpiry_err']) && empty($data['hostExpiry_err'])) {
                //Validated
                if ($this->domainModel->updateDomain($data)) {
                    flash('updated_domain', 'Domain updated');
                    redirect('domains');
                } else {
                    die('Something went wrong');
                }
            } else {
                //Load the view with errors
                $this->view('pages/domainedit', $data);
            }
        } else {
            //Get existing domain from model
            $domain = $this->domainModel->getDomainById($id);

            $data = [
                'id' => $id,
                'domain' => $domain->Domain,
                'customerName' => $domain->customerName,
                'hostingCompany' => $domain->hostingCompany,
                'otherDetails' => $domain->otherDetails,
                'hostExpiry' => $domain->hostExpiry,
                'domainExpiry' => $domain->domainExpiry
            ];
            $this->view('pages/domainedit', $data);
        }
    }

    public function deleteDomain($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->domainModel->deleteDomain($id)) {
                flash('domain_deleted', 'Domain deleted');
                redirect('domains');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('domains');
        }
    }

    //Logout
    public function logout() {
        unset($_SESSION['user_id']);
        session_destroy();
        redirect('');
    }

}
