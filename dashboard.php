<?php
    /**
     * Created by PhpStorm.
     * User: Eric McWinNEr
     * Date: 7/27/2018
     * Time: 1:54 PM
     */
    
    include_once "utilities/Utilities.php";
    include_once "config/Database.php";
    include_once "model/AdminDAO.php";
    include_once "model/PackageDAO.php";
    include_once "model/RegistrationPinDAO.php";
    include_once "model/ContactDAO.php";
    include_once "model/LoggerDAO.php";
    include_once "utilities/Session.php";
    
    $session = new Session();
    $session -> redirectUnsignedAdmin('login.php');
    $admin = $session -> returnAdminObject();
    $firstName = explode(" ", $admin -> getName())[0];
    $config = parse_ini_file('config/config.ini', TRUE);
    try
    {
        $packages = PackageDAO ::getAllPackages();
        $pendingPackages = PackageDAO ::getAllPendingPackages();
        $totalPins = RegistrationPinDAO ::countPins();
        $unusedPins = RegistrationPinDAO ::countUnusedPins();
        $totalAdmins = AdminDAO ::countAdmins();
        # $countMessages = (ContactDAO ::countContacts() >= 1) ? ContactDAO ::countContacts() : 0;
        $timeAdminLastCreated = AdminDAO ::getTimeLastRegistered();
    }
    catch (RuntimeException $exp)
    {
    
    }
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include "partitions/admin/head.php"; ?>
        <title><?php echo "$firstName's dashboard | '" . $config['siteDetails']['acronym']; ?></title>
    </head>

    <body>
        <div class="container-scroller">
            <?php include 'partitions/admin/navbar.php'; ?>
            <div class="container-fluid page-body-wrapper">
                <?php include 'partitions/admin/sidebar.php'; ?>
                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div data-href="packagelist.php" class="col-xl-3 clickedDiv col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <i class="mdi mdi-package-variant-closed text-primary icon-lg"></i>
                                            </div>
                                            <div class="float-right">
                                                <p class="mb-0 text-right">Total Packages</p>
                                                <div class="fluid-container">
                                                    <h3 class="font-weight-medium text-right mb-0"><?php echo count($packages); ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-muted mt-3 mb-0">
                                            <i class="mdi mdi-truck-delivery mr-1" aria-hidden="true"></i> <?php echo count($pendingPackages); ?> pending packages
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <i class="mdi mdi-message-text text-success icon-lg"></i>
                                            </div>
                                            <div class="float-right">
                                                <p class="mb-0 text-right">Messages</p>
                                                <div class="fluid-container">
                                                    <h3 class="font-weight-medium text-right mb-0">0</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-muted mt-3 mb-0">
                                            <i class="mdi mdi-message-alert mr-1" aria-hidden="true"></i> No Messages Sent
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div data-href="admins.php" class="col-xl-3 col-lg-3 clickedDiv col-md-3 col-sm-6 grid-margin stretch-card">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <i class="mdi mdi-account-location text-info icon-lg"></i>
                                            </div>
                                            <div class="float-right">
                                                <p class="mb-0 text-right">Admins</p>
                                                <div class="fluid-container">
                                                    <h3 class="font-weight-medium text-right mb-0"><?php echo $totalAdmins; ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-muted mt-3 mb-0">
                                            <i class="mdi mdi-clock mr-1" aria-hidden="true"></i> Last registered
                                            <?php
                                                
                                                $today = time();
                                                $day = date('d m Y', $today);
                                                $dateAdminLastCreated = date('d m Y', $timeAdminLastCreated);
                                                if ($day == $dateAdminLastCreated)
                                                {
                                                    echo " today";
                                                }
                                                else if ($day > $dateAdminLastCreated)
                                                {
                                                    echo $dateAdminLastCreated;
                                                }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div data-href="listpins.php" class="col-xl-3 clickedDiv col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <i class="mdi mdi-lock text-danger icon-lg"></i>
                                            </div>
                                            <div class="float-right">
                                                <p class="mb-0 text-right">Registration Pins</p>
                                                <div class="fluid-container">
                                                    <h3 class="font-weight-medium text-right mb-0"><?php echo $totalPins; ?></h3>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="text-muted mt-3 mb-0">
                                            <i class="mdi mdi-lock-open-outline mr-1" aria-hidden="true"></i> <?php echo $unusedPins; ?> unused pin<?php echo(($unusedPins != 1) ? "s" : ""); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (count($pendingPackages) >= 1): ?>
                            <div class="row">
                                <div class="col-lg-12 grid-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Pending Packages</h4>
                                            <div class="table-responsive">

                                                <table id="registrationPinTable" class="table table-hover dataTable table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Actions</th>
                                                            <th>#</th>
                                                            <th>Tracking ID</th>
                                                            <th>Invoice No</th>
                                                            <th>Status</th>
                                                            <th>Created By</th>
                                                            <th>Shipper</th>
                                                            <th>Shipper Phone</th>
                                                            <th>Shipper Address</th>
                                                            <th>Receiver</th>
                                                            <th>Receiver Phone</th>
                                                            <th>Receiver Address</th>
                                                            <th>Description</th>
                                                            <th>Package Type</th>
                                                            <th>Shipping Mode</th>
                                                            <th>Weight</th>
                                                            <th>Total Freight</th>
                                                            <th>Original Location</th>
                                                            <th>Current Location</th>
                                                            <th>Destination</th>
                                                            <th>Take-off Date</th>
                                                            <th>Pickup Date</th>
                                                            <th>Time Created</th>
                                                            <th>Time Edited</th>
                                                            <th>Last Edited By</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php for ($i = 0; $i < count($pendingPackages); $i++): ?>
                                                            <?php
                                                            
                                                            $package = $pendingPackages[$i];
                                                            ?>
                                                            <tr id="<?php echo $package -> getPackageId(); ?>">
                                                                <td>
                                                                    <?php echo($i + 1); ?>
                                                                </td>
                                                                <td>
                                                                    <a href="editPackage.php?id=<?php echo $package -> getPackageId(); ?>" class="text-info underline">Edit</a>
                                                                    <a href="#" class="deletePackage underline text-danger" style="margin-left: 10px" data-id="<?php echo $package -> getPackageId(); ?>">Delete</a>
                                                                </td>

                                                                <td>
                                                                    <?php echo $package -> getTrackingId(); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $package -> getInvoiceNo(); ?>
                                                                </td>
                                                                <td><?php
                                                                        
                                                                        switch ($package -> getStatus())
                                                                        {
                                                                            case "pending":
                                                                                echo "<span class='badge badge-danger'>";
                                                                                break;
                                                                            case "in progress":
                                                                                echo "<span class='badge badge-warning'>";
                                                                                break;
                                                                            default:
                                                                                echo "<span class='badge badge-success'>";
                                                                        }
                                                                    ?>
                                                                    <?php echo $package -> getStatus(); ?></span>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                        
                                                                        $admin = AdminDAO ::getAdminById($package -> getAdminId());
                                                                        echo $admin -> getName() . "<span class='text-danger'><span> <</span>" . $admin -> getEmail() . "<span>></span></span>";
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                        
                                                                        echo $package -> getShipperName() . '<span class="text-danger"><span> <</span>' . $package -> getShipperEmail() . '<span>></span></span>';
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $package -> getShipperPhone(); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $package -> getShipperAddress(); ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                        
                                                                        echo $package -> getReceiverName() . '<span class="text-danger"><span> <</span>' . $package -> getReceiverEmail() . '<span>></span></span>';
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $package -> getReceiverPhone(); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $package -> getReceiverAddress(); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $package -> getDescription(); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $package -> getPackageType(); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $package -> getShippingMode(); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $package -> getWeight(); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $package -> getTotalFreight(); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $package -> getOriginalLocation(); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $package -> getCurrentLocation(); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $package -> getDestination(); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $package -> getTakeoffTime(); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $package -> getPickupTime(); ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo date('D, jS M, Y - h:i A', $package -> getTimeCreated()); ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                        
                                                                        if (is_null($package -> getTimeUpdated()))
                                                                        {
                                                                            echo "-----";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo date('D, jS M, Y - h:i A', $package -> getTimeUpdated());
                                                                        }
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                        
                                                                        if (is_null($package -> getLastEditedBy()))
                                                                        {
                                                                            echo "-----";
                                                                        }
                                                                        else
                                                                        {
                                                                            echo AdminDAO ::getAdminById((int)$package -> getLastEditedBy()) -> getName() . '<span class="text-danger"><span> <</span>' . AdminDAO ::getAdminById((int)$package -> getLastEditedBy()) -> getEmail() . '<span>></span></span>';
                                                                        }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        <?php endfor; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <!--<div class="row">
                            <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Manage Tickets</h5>
                                        <div class="fluid-container">
                                            <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
                                                <div class="col-md-1">
                                                    <img class="img-sm rounded-circle mb-4 mb-md-0" src="images/faces/face1.jpg" alt="profile image">
                                                </div>
                                                <div class="ticket-details col-md-9">
                                                    <div class="d-flex">
                                                        <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">James :</p>
                                                        <p class="text-primary mr-1 mb-0">[#23047]</p>
                                                        <p class="mb-0 ellipsis">Donec rutrum congue leo eget malesuada.</p>
                                                    </div>
                                                    <p class="text-gray ellipsis mb-2">Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim
                                                        vivamus.
                                                    </p>
                                                    <div class="row text-gray d-md-flex d-none">
                                                        <div class="col-4 d-flex">
                                                            <small class="mb-0 mr-2 text-muted text-muted">Last responded :</small>
                                                            <small class="Last-responded mr-2 mb-0 text-muted text-muted">3 hours ago</small>
                                                        </div>
                                                        <div class="col-4 d-flex">
                                                            <small class="mb-0 mr-2 text-muted text-muted">Due in :</small>
                                                            <small class="Last-responded mr-2 mb-0 text-muted text-muted">2 Days</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ticket-actions col-md-2">
                                                    <div class="btn-group dropdown">
                                                        <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Manage
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fa fa-reply fa-fw"></i>Quick reply</a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fa fa-history fa-fw"></i>Another action</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
                                                <div class="col-md-1">
                                                    <img class="img-sm rounded-circle mb-4 mb-md-0" src="images/faces/face2.jpg" alt="profile image">
                                                </div>
                                                <div class="ticket-details col-md-9">
                                                    <div class="d-flex">
                                                        <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">Stella :</p>
                                                        <p class="text-primary mr-1 mb-0">[#23135]</p>
                                                        <p class="mb-0 ellipsis">Curabitur aliquet quam id dui posuere blandit.</p>
                                                    </div>
                                                    <p class="text-gray ellipsis mb-2">Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Curabitur non nulla sit amet
                                                        nisl.
                                                    </p>
                                                    <div class="row text-gray d-md-flex d-none">
                                                        <div class="col-4 d-flex">
                                                            <small class="mb-0 mr-2 text-muted">Last responded :</small>
                                                            <small class="Last-responded mr-2 mb-0 text-muted">3 hours ago</small>
                                                        </div>
                                                        <div class="col-4 d-flex">
                                                            <small class="mb-0 mr-2 text-muted">Due in :</small>
                                                            <small class="Last-responded mr-2 mb-0 text-muted">2 Days</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ticket-actions col-md-2">
                                                    <div class="btn-group dropdown">
                                                        <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Manage
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fa fa-reply fa-fw"></i>Quick reply</a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fa fa-history fa-fw"></i>Another action</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ticket-card mt-3">
                                                <div class="col-md-1">
                                                    <img class="img-sm rounded-circle mb-4 mb-md-0" src="images/faces/face3.jpg" alt="profile image">
                                                </div>
                                                <div class="ticket-details col-md-9">
                                                    <div class="d-flex">
                                                        <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">John Doe :</p>
                                                        <p class="text-primary mr-1 mb-0">[#23246]</p>
                                                        <p class="mb-0 ellipsis">Mauris blandit aliquet elit, eget tincidunt nibh pulvinar.</p>
                                                    </div>
                                                    <p class="text-gray ellipsis mb-2">Nulla quis lorem ut libero malesuada feugiat. Proin eget tortor risus. Lorem ipsum dolor sit amet.</p>
                                                    <div class="row text-gray d-md-flex d-none">
                                                        <div class="col-4 d-flex">
                                                            <small class="mb-0 mr-2 text-muted">Last responded :</small>
                                                            <small class="Last-responded mr-2 mb-0 text-muted">3 hours ago</small>
                                                        </div>
                                                        <div class="col-4 d-flex">
                                                            <small class="mb-0 mr-2 text-muted">Due in :</small>
                                                            <small class="Last-responded mr-2 mb-0 text-muted">2 Days</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ticket-actions col-md-2">
                                                    <div class="btn-group dropdown">
                                                        <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            Manage
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fa fa-reply fa-fw"></i>Quick reply</a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fa fa-history fa-fw"></i>Another action</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>
                    <!-- content-wrapper ends -->
                    <?php include 'partitions/admin/footer.php'; ?>
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <?php include 'partitions/admin/scripts.php'; ?>
        <script>
            $(document).ready(function ()
            {
                $('#registrationPinTable').DataTable();
                $('.deletePackage').click(function (event)
                {
                    event.preventDefault();
                    var clicked = $(this);
                    var id = $(this).attr('data-id');
                    $.ajax({
                        type: "post",
                        url: "controllers/package.php",
                        data: {
                            reason: 'deletePackage',
                            packageId: id
                        },
                        success: function (msg)
                        {
                            if ((new RegExp("Success:")).test(msg))
                            {
                                swal({
                                    title: "Success!",
                                    text: "Your package was deleted successfully",
                                    icon: "success"
                                });
                                clicked.parents('tr').first().detach();
                            }
                            else
                            {
                                swal({
                                    title: "Error!",
                                    text: "Something went wrong. Please try again later!",
                                    icon: "error"
                                });
                            }
                        }
                    });
                });
            });
        </script>
    </body>

</html>
