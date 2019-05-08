<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Responsive meta tag for mobile devices --->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- toggle --->
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

    <title>AutoMate - Deploy Amazon VPC</title>
    <style type="text/css">
        .box{
            color: black;
            display: none;


        }


        .PublicSubnet1{ background: #ffffff; }
        .PublicSubnet2{ background: #ffffff; }
        .PublicSubnet3{background: #ffffff;}
        .PublicSubnet4{background: #ffffff;}
        .PrivateSubnet1{ background: #ffffff; }
        .PrivateSubnet2{ background: #ffffff; }
        .PrivateSubnet3{background: #ffffff;}
        .PrivateSubnet4{background: #ffffff;}
        .VPC{background: #ffffff;}
        .NAT{background: #ffffff;}
        .IGW{background: #ffffff;}
        label{ margin-right: 15px; }
    </style>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('input[type="checkbox"]').click(function(){
                var inputValue = $(this).attr("value");
                $("." + inputValue).toggle();
            });

        });
    </script>


    <script>

        function printVar() {

            document.getElementById("vpc-name-result").innerHTML = document.getElementById("vpc-name").value;
            document.getElementById("vpc-cidr-result").innerHTML = document.getElementById("vpc-cidr").value;

        }

    </script>


    <script>
        function printPuS1Var() {
            document.getElementById("pus1-name-result").innerHTML = document.getElementById("pus1-name").value;
            document.getElementById("pus1-cidr-result").innerHTML = document.getElementById("pus1-cidr").value;
            document.getElementById("pus1-auto-result").innerHTML = document.getElementById("pus1-auto").value;

        }
    </script>

    <script>
        function printPuS2Var() {
            document.getElementById("pus2-name-result").innerHTML = document.getElementById("pus2-name").value;
            document.getElementById("pus2-cidr-result").innerHTML = document.getElementById("pus2-cidr").value;
            document.getElementById("pus2-auto-result").innerHTML = document.getElementById("pus2-auto").value;

        }
    </script>

    <script>
        function printPuS3Var() {
            document.getElementById("pus3-name-result").innerHTML = document.getElementById("pus3-name").value;
            document.getElementById("pus3-cidr-result").innerHTML = document.getElementById("pus3-cidr").value;
            document.getElementById("pus3-auto-result").innerHTML = document.getElementById("pus3-auto").value;

        }
    </script>

    <script>
        function printPuS4Var() {
            document.getElementById("pus4-name-result").innerHTML = document.getElementById("pus4-name").value;
            document.getElementById("pus4-cidr-result").innerHTML = document.getElementById("pus4-cidr").value;
            document.getElementById("pus4-auto-result").innerHTML = document.getElementById("pus4-auto").value;

        }
    </script>




    <script>
        function printPrS1Var() {
            document.getElementById("prs1-name-result").innerHTML = document.getElementById("prs1-name").value;
            document.getElementById("prs1-cidr-result").innerHTML = document.getElementById("prs1-cidr").value;
            document.getElementById("prs1-auto-result").innerHTML = document.getElementById("prs1-auto").value;

        }
    </script>

    <script>
        function printPrS2Var() {
            document.getElementById("prs2-name-result").innerHTML = document.getElementById("prs2-name").value;
            document.getElementById("prs2-cidr-result").innerHTML = document.getElementById("prs2-cidr").value;
            document.getElementById("prs2-auto-result").innerHTML = document.getElementById("prs2-auto").value;

        }
    </script>

    <script>
        function printPrS3Var() {
            document.getElementById("prs3-name-result").innerHTML = document.getElementById("prs3-name").value;
            document.getElementById("prs3-cidr-result").innerHTML = document.getElementById("prs3-cidr").value;
            document.getElementById("prs3-auto-result").innerHTML = document.getElementById("prs3-auto").value;

        }
    </script>

    <script>
        function printPrS4Var() {
            document.getElementById("prs4-name-result").innerHTML = document.getElementById("prs4-name").value;
            document.getElementById("prs4-cidr-result").innerHTML = document.getElementById("prs4-cidr").value;
            document.getElementById("prs4-auto-result").innerHTML = document.getElementById("prs4-auto").value;

        }
    </script>





    <script>
        $(document).ready(function(){
            $('#AvailabilityZones').on('change', function(){
                if (this.value == 'One' && $('#subnet-tiers').val() == 'Public-Private')
                {

                        $('#PuS1').show(),
                        $('#PublicSubnet1Route').show(),

                        $('#PuS2').hide(),
                        $('#PublicSubnet2Route').hide(),

                        $('#PuS3').hide(),
                        $('#PublicSubnet3Route').hide(),

                        $('#PuS4').hide(),
                        $('#PublicSubnet4Route').hide(),



                        $('#PrS1').show(),
                        $('#PrivateSubnet1Route').show(),

                        $('#PrS2').hide(),
                        $('#PrivateSubnet2Route').hide(),

                        $('#PrS3').hide(),
                        $('#PrivateSubnet3Route').hide(),

                        $('#PrS4').hide(),
                        $('#PrivateSubnet4Route').hide(),


                            //public subnets checked true or false

                            $('input[name=PuS1Checkbox]').attr('checked', true),
                            $('input[name=PuS2Checkbox]').attr('checked', false),
                            $('input[name=PuS3Checkbox]').attr('checked', false),
                            $('input[name=PuS4Checkbox]').attr('checked', false),



                            //private subnets checked true or false

                            $('input[name=PrS2Checkbox]').attr('checked', true),
                            $('input[name=PrS2Checkbox]').attr('checked', false),
                            $('input[name=PrS3Checkbox]').attr('checked', false),
                            $('input[name=PrS4Checkbox]').attr('checked', false),



                            //public subnets disables true or false

                            $("#PuS1Checkbox").attr("disabled", false),
                            $("#PuS2Checkbox").attr("disabled", true),
                            $("#PuS3Checkbox").attr("disabled", true),
                            $("#PuS4Checkbox").attr("disabled", true),


                            //private subnets disabled true or false

                            $("#PrS1Checkbox").attr("disabled", false),
                            $("#PrS2Checkbox").attr("disabled", true),
                            $("#PrS3Checkbox").attr("disabled", true),
                            $("#PrS4Checkbox").attr("disabled", true);





                }

                else if (this.value == 'Two' && $('#subnet-tiers').val() == 'Public-Private')
                {


                    $('#PuS1').show(),
                        $('#PublicSubnet1Route').show(),

                        $('#PuS2').show(),
                        $('#PublicSubnet2Route').show(),

                        $('#PuS3').hide(),
                        $('#PublicSubnet3Route').hide(),

                        $('#PuS4').hide(),
                        $('#PublicSubnet4Route').hide(),



                        $('#PrS1').show(),
                        $('#PrivateSubnet1Route').show(),

                        $('#PrS2').show(),
                        $('#PrivateSubnet2Route').show(),

                        $('#PrS3').hide(),
                        $('#PrivateSubnet3Route').hide(),

                        $('#PrS4').hide(),
                        $('#PrivateSubnet4Route').hide(),


                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', true),
                        $('input[name=PuS2Checkbox]').attr('checked', true),
                        $('input[name=PuS3Checkbox]').attr('checked', false),
                        $('input[name=PuS4Checkbox]').attr('checked', false),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS3Checkbox]').attr('checked', false),
                        $('input[name=PrS4Checkbox]').attr('checked', false),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", false),
                        $("#PuS2Checkbox").attr("disabled", false),
                        $("#PuS3Checkbox").attr("disabled", true),
                        $("#PuS4Checkbox").attr("disabled", true),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", false),
                        $("#PrS2Checkbox").attr("disabled", false),
                        $("#PrS3Checkbox").attr("disabled", true),
                        $("#PrS4Checkbox").attr("disabled", true);



                }
                else if (this.value == 'Three' && $('#subnet-tiers').val() == 'Public-Private')
                {

                    $('#PuS1').show(),
                        $('#PublicSubnet1Route').show(),

                        $('#PuS2').show(),
                        $('#PublicSubnet2Route').show(),

                        $('#PuS3').show(),
                        $('#PublicSubnet3Route').show(),

                        $('#PuS4').hide(),
                        $('#PublicSubnet4Route').hide(),



                        $('#PrS1').show(),
                        $('#PrivateSubnet1Route').show(),

                        $('#PrS2').show(),
                        $('#PrivateSubnet2Route').show(),

                        $('#PrS3').show(),
                        $('#PrivateSubnet3Route').show(),

                        $('#PrS4').hide(),
                        $('#PrivateSubnet4Route').hide(),

                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', true),
                        $('input[name=PuS2Checkbox]').attr('checked', true),
                        $('input[name=PuS3Checkbox]').attr('checked', true),
                        $('input[name=PuS4Checkbox]').attr('checked', false),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS3Checkbox]').attr('checked', true),
                        $('input[name=PrS4Checkbox]').attr('checked', false),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", false),
                        $("#PuS2Checkbox").attr("disabled", false),
                        $("#PuS3Checkbox").attr("disabled", false),
                        $("#PuS4Checkbox").attr("disabled", true),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", false),
                        $("#PrS2Checkbox").attr("disabled", false),
                        $("#PrS3Checkbox").attr("disabled", false),
                        $("#PrS4Checkbox").attr("disabled", true);



                }
                else if (this.value == 'Four' && $('#subnet-tiers').val() == 'Public-Private')
                {

                    $('#PuS1').show(),
                        $('#PublicSubnet1Route').show(),

                        $('#PuS2').show(),
                        $('#PublicSubnet2Route').show(),

                        $('#PuS3').show(),
                        $('#PublicSubnet3Route').show(),

                        $('#PuS4').show(),
                        $('#PublicSubnet4Route').show(),



                        $('#PrS1').show(),
                        $('#PrivateSubnet1Route').show(),

                        $('#PrS2').show(),
                        $('#PrivateSubnet2Route').show(),

                        $('#PrS3').show(),
                        $('#PrivateSubnet3Route').show(),

                        $('#PrS4').show(),
                        $('#PrivateSubnet4Route').show(),

                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', true),
                        $('input[name=PuS2Checkbox]').attr('checked', true),
                        $('input[name=PuS3Checkbox]').attr('checked', true),
                        $('input[name=PuS4Checkbox]').attr('checked', true),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS3Checkbox]').attr('checked', true),
                        $('input[name=PrS4Checkbox]').attr('checked', true),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", false),
                        $("#PuS2Checkbox").attr("disabled", false),
                        $("#PuS3Checkbox").attr("disabled", false),
                        $("#PuS4Checkbox").attr("disabled", false),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", false),
                        $("#PrS2Checkbox").attr("disabled", false),
                        $("#PrS3Checkbox").attr("disabled", false),
                        $("#PrS4Checkbox").attr("disabled", false);






                }


                //Availability Zones is One and Subnet Tiers is Public-Only,
                    //I will keep on changing the number of availability zones in this coming conditions


                else if (this.value == 'One' && $('#subnet-tiers').val() == 'Public-Only') {


                    $('#PuS1').show(),
                        $('#PublicSubnet1Route').show(),

                        $('#PuS2').hide(),
                        $('#PublicSubnet2Route').hide(),

                        $('#PuS3').hide(),
                        $('#PublicSubnet3Route').hide(),

                        $('#PuS4').hide(),
                        $('#PublicSubnet4Route').hide(),



                        $('#PrS1').hide(),
                        $('#PrivateSubnet1Route').hide(),

                        $('#PrS2').hide(),
                        $('#PrivateSubnet2Route').hide(),

                        $('#PrS3').hide(),
                        $('#PrivateSubnet3Route').hide(),

                        $('#PrS4').hide(),
                        $('#PrivateSubnet4Route').hide(),


                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', true),
                        $('input[name=PuS2Checkbox]').attr('checked', false),
                        $('input[name=PuS3Checkbox]').attr('checked', false),
                        $('input[name=PuS4Checkbox]').attr('checked', false),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', false),
                        $('input[name=PrS2Checkbox]').attr('checked', false),
                        $('input[name=PrS3Checkbox]').attr('checked', false),
                        $('input[name=PrS4Checkbox]').attr('checked', false),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", false),
                        $("#PuS2Checkbox").attr("disabled", true),
                        $("#PuS3Checkbox").attr("disabled", true),
                        $("#PuS4Checkbox").attr("disabled", true),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", true),
                        $("#PrS2Checkbox").attr("disabled", true),
                        $("#PrS3Checkbox").attr("disabled", true),
                        $("#PrS4Checkbox").attr("disabled", true);







                }

                else if (this.value == 'Two' && $('#subnet-tiers').val() == 'Public-Only') {

                    $('#PuS1').show(),
                        $('#PublicSubnet1Route').show(),

                        $('#PuS2').show(),
                        $('#PublicSubnet2Route').show(),

                        $('#PuS3').hide(),
                        $('#PublicSubnet3Route').hide(),

                        $('#PuS4').hide(),
                        $('#PublicSubnet4Route').hide(),



                        $('#PrS1').hide(),
                        $('#PrivateSubnet1Route').hide(),

                        $('#PrS2').hide(),
                        $('#PrivateSubnet2Route').hide(),

                        $('#PrS3').hide(),
                        $('#PrivateSubnet3Route').hide(),

                        $('#PrS4').hide(),
                        $('#PrivateSubnet4Route').hide(),


                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', true),
                        $('input[name=PuS2Checkbox]').attr('checked', true),
                        $('input[name=PuS3Checkbox]').attr('checked', false),
                        $('input[name=PuS4Checkbox]').attr('checked', false),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', false),
                        $('input[name=PrS2Checkbox]').attr('checked', false),
                        $('input[name=PrS3Checkbox]').attr('checked', false),
                        $('input[name=PrS4Checkbox]').attr('checked', false),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", false),
                        $("#PuS2Checkbox").attr("disabled", false),
                        $("#PuS3Checkbox").attr("disabled", true),
                        $("#PuS4Checkbox").attr("disabled", true),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", true),
                        $("#PrS2Checkbox").attr("disabled", true),
                        $("#PrS3Checkbox").attr("disabled", true),
                        $("#PrS4Checkbox").attr("disabled", true);




                }

                else if (this.value == 'Three' && $('#subnet-tiers').val() == 'Public-Only') {

                    $('#PuS1').show(),
                        $('#PublicSubnet1Route').show(),

                        $('#PuS2').show(),
                        $('#PublicSubnet2Route').show(),

                        $('#PuS3').show(),
                        $('#PublicSubnet3Route').show(),

                        $('#PuS4').hide(),
                        $('#PublicSubnet4Route').hide(),



                        $('#PrS1').hide(),
                        $('#PrivateSubnet1Route').hide(),

                        $('#PrS2').hide(),
                        $('#PrivateSubnet2Route').hide(),

                        $('#PrS3').hide(),
                        $('#PrivateSubnet3Route').hide(),

                        $('#PrS4').hide(),
                        $('#PrivateSubnet4Route').hide(),

                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', true),
                        $('input[name=PuS2Checkbox]').attr('checked', true),
                        $('input[name=PuS3Checkbox]').attr('checked', true),
                        $('input[name=PuS4Checkbox]').attr('checked', false),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', false),
                        $('input[name=PrS2Checkbox]').attr('checked', false),
                        $('input[name=PrS3Checkbox]').attr('checked', false),
                        $('input[name=PrS4Checkbox]').attr('checked', false),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", false),
                        $("#PuS2Checkbox").attr("disabled", false),
                        $("#PuS3Checkbox").attr("disabled", false),
                        $("#PuS4Checkbox").attr("disabled", true),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", true),
                        $("#PrS2Checkbox").attr("disabled", true),
                        $("#PrS3Checkbox").attr("disabled", true),
                        $("#PrS4Checkbox").attr("disabled", true);






                }

                else if (this.value == 'Four' && $('#subnet-tiers').val() == 'Public-Only') {


                    $('#PuS1').show(),
                        $('#PublicSubnet1Route').show(),

                        $('#PuS2').show(),
                        $('#PublicSubnet2Route').show(),

                        $('#PuS3').show(),
                        $('#PublicSubnet3Route').show(),

                        $('#PuS4').show(),
                        $('#PublicSubnet4Route').show(),



                        $('#PrS1').hide(),
                        $('#PrivateSubnet1Route').hide(),

                        $('#PrS2').hide(),
                        $('#PrivateSubnet2Route').hide(),

                        $('#PrS3').hide(),
                        $('#PrivateSubnet3Route').hide(),

                        $('#PrS4').hide(),
                        $('#PrivateSubnet4Route').hide(),

                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', true),
                        $('input[name=PuS2Checkbox]').attr('checked', true),
                        $('input[name=PuS3Checkbox]').attr('checked', true),
                        $('input[name=PuS4Checkbox]').attr('checked', true),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', false),
                        $('input[name=PrS2Checkbox]').attr('checked', false),
                        $('input[name=PrS3Checkbox]').attr('checked', false),
                        $('input[name=PrS4Checkbox]').attr('checked', false),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", false),
                        $("#PuS2Checkbox").attr("disabled", false),
                        $("#PuS3Checkbox").attr("disabled", false),
                        $("#PuS4Checkbox").attr("disabled", false),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", true),
                        $("#PrS2Checkbox").attr("disabled", true),
                        $("#PrS3Checkbox").attr("disabled", true),
                        $("#PrS4Checkbox").attr("disabled", true);







                }

// this is the code for setting the subnet tier to private only and keep on chaanging the number of subnets


                else if (this.value == 'One' && $('#subnet-tiers').val() == 'Private-Only' ) {

                    $('#PuS1').hide(),
                        $('#PublicSubnet1Route').hide(),

                        $('#PuS2').hide(),
                        $('#PublicSubnet2Route').hide(),

                        $('#PuS3').hide(),
                        $('#PublicSubnet3Route').hide(),

                        $('#PuS4').hide(),
                        $('#PublicSubnet4Route').hide(),



                        $('#PrS1').show(),
                        $('#PrivateSubnet1Route').show(),

                        $('#PrS2').hide(),
                        $('#PrivateSubnet2Route').hide(),

                        $('#PrS3').hide(),
                        $('#PrivateSubnet3Route').hide(),

                        $('#PrS4').hide(),
                        $('#PrivateSubnet4Route').hide(),


                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', false),
                        $('input[name=PuS2Checkbox]').attr('checked', false),
                        $('input[name=PuS3Checkbox]').attr('checked', false),
                        $('input[name=PuS4Checkbox]').attr('checked', false),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS2Checkbox]').attr('checked', false),
                        $('input[name=PrS3Checkbox]').attr('checked', false),
                        $('input[name=PrS4Checkbox]').attr('checked', false),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", true),
                        $("#PuS2Checkbox").attr("disabled", true),
                        $("#PuS3Checkbox").attr("disabled", true),
                        $("#PuS4Checkbox").attr("disabled", true),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", false),
                        $("#PrS2Checkbox").attr("disabled", true),
                        $("#PrS3Checkbox").attr("disabled", true),
                        $("#PrS4Checkbox").attr("disabled", true);





                }

                else if (this.value == 'Two' && $('#subnet-tiers').val() == 'Private-Only')
                {


                    $('#PuS1').hide(),
                        $('#PublicSubnet1Route').hide(),

                        $('#PuS2').hide(),
                        $('#PublicSubnet2Route').hide(),

                        $('#PuS3').hide(),
                        $('#PublicSubnet3Route').hide(),

                        $('#PuS4').hide(),
                        $('#PublicSubnet4Route').hide(),



                        $('#PrS1').show(),
                        $('#PrivateSubnet1Route').show(),

                        $('#PrS2').show(),
                        $('#PrivateSubnet2Route').show(),

                        $('#PrS3').hide(),
                        $('#PrivateSubnet3Route').hide(),

                        $('#PrS4').hide(),
                        $('#PrivateSubnet4Route').hide(),


                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', false),
                        $('input[name=PuS2Checkbox]').attr('checked', false),
                        $('input[name=PuS3Checkbox]').attr('checked', false),
                        $('input[name=PuS4Checkbox]').attr('checked', false),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS3Checkbox]').attr('checked', false),
                        $('input[name=PrS4Checkbox]').attr('checked', false),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", true),
                        $("#PuS2Checkbox").attr("disabled", true),
                        $("#PuS3Checkbox").attr("disabled", true),
                        $("#PuS4Checkbox").attr("disabled", true),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", false),
                        $("#PrS2Checkbox").attr("disabled", false),
                        $("#PrS3Checkbox").attr("disabled", true),
                        $("#PrS4Checkbox").attr("disabled", true);



                }
                else if (this.value == 'Three' && $('#subnet-tiers').val() == 'Private-Only')
                {

                    $('#PuS1').hide(),
                        $('#PublicSubnet1Route').hide(),

                        $('#PuS2').hide(),
                        $('#PublicSubnet2Route').hide(),

                        $('#PuS3').hide(),
                        $('#PublicSubnet3Route').hide(),

                        $('#PuS4').hide(),
                        $('#PublicSubnet4Route').hide(),



                        $('#PrS1').show(),
                        $('#PrivateSubnet1Route').show(),

                        $('#PrS2').show(),
                        $('#PrivateSubnet2Route').show(),

                        $('#PrS3').show(),
                        $('#PrivateSubnet3Route').show(),

                        $('#PrS4').hide(),
                        $('#PrivateSubnet4Route').hide(),

                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', false),
                        $('input[name=PuS2Checkbox]').attr('checked', false),
                        $('input[name=PuS3Checkbox]').attr('checked', false),
                        $('input[name=PuS4Checkbox]').attr('checked', false),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS3Checkbox]').attr('checked', true),
                        $('input[name=PrS4Checkbox]').attr('checked', false),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", true),
                        $("#PuS2Checkbox").attr("disabled", true),
                        $("#PuS3Checkbox").attr("disabled", true),
                        $("#PuS4Checkbox").attr("disabled", true),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", false),
                        $("#PrS2Checkbox").attr("disabled", false),
                        $("#PrS3Checkbox").attr("disabled", false),
                        $("#PrS4Checkbox").attr("disabled", true);



                }
                else if (this.value == 'Four' && $('#subnet-tiers').val() == 'Private-Only')
                {

                    $('#PuS1').hide(),
                        $('#PublicSubnet1Route').hide(),

                        $('#PuS2').hide(),
                        $('#PublicSubnet2Route').hide(),

                        $('#PuS3').hide(),
                        $('#PublicSubnet3Route').hide(),

                        $('#PuS4').hide(),
                        $('#PublicSubnet4Route').hide(),



                        $('#PrS1').show(),
                        $('#PrivateSubnet1Route').show(),

                        $('#PrS2').show(),
                        $('#PrivateSubnet2Route').show(),

                        $('#PrS3').show(),
                        $('#PrivateSubnet3Route').show(),

                        $('#PrS4').show(),
                        $('#PrivateSubnet4Route').show(),

                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', false),
                        $('input[name=PuS2Checkbox]').attr('checked', false),
                        $('input[name=PuS3Checkbox]').attr('checked', false),
                        $('input[name=PuS4Checkbox]').attr('checked', false),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS3Checkbox]').attr('checked', true),
                        $('input[name=PrS4Checkbox]').attr('checked', true),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", true),
                        $("#PuS2Checkbox").attr("disabled", true),
                        $("#PuS3Checkbox").attr("disabled", true),
                        $("#PuS4Checkbox").attr("disabled", true),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", false),
                        $("#PrS2Checkbox").attr("disabled", false),
                        $("#PrS3Checkbox").attr("disabled", false),
                        $("#PrS4Checkbox").attr("disabled", false);






                }

            });
        });

 </script>



    <script>

        //public-private is set, keep on changing the number of availabilty zones:

        $(document).ready(function(){
            $('#subnet-tiers').on('change', function(){
                if (this.value == 'Public-Private' && $('#AvailabilityZones').val() == 'One') {

                    $('#PuS1').show(),
                        $('#PublicSubnet1Route').show(),

                        $('#PuS2').hide(),
                        $('#PublicSubnet2Route').hide(),

                        $('#PuS3').hide(),
                        $('#PublicSubnet3Route').hide(),

                        $('#PuS4').hide(),
                        $('#PublicSubnet4Route').hide(),



                        $('#PrS1').show(),
                        $('#PrivateSubnet1Route').show(),

                        $('#PrS2').hide(),
                        $('#PrivateSubnet2Route').hide(),

                        $('#PrS3').hide(),
                        $('#PrivateSubnet3Route').hide(),

                        $('#PrS4').hide(),
                        $('#PrivateSubnet4Route').hide(),


                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', true),
                        $('input[name=PuS2Checkbox]').attr('checked', false),
                        $('input[name=PuS3Checkbox]').attr('checked', false),
                        $('input[name=PuS4Checkbox]').attr('checked', false),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS2Checkbox]').attr('checked', false),
                        $('input[name=PrS3Checkbox]').attr('checked', false),
                        $('input[name=PrS4Checkbox]').attr('checked', false),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", false),
                        $("#PuS2Checkbox").attr("disabled", true),
                        $("#PuS3Checkbox").attr("disabled", true),
                        $("#PuS4Checkbox").attr("disabled", true),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", false),
                        $("#PrS2Checkbox").attr("disabled", true),
                        $("#PrS3Checkbox").attr("disabled", true),
                        $("#PrS4Checkbox").attr("disabled", true);





                }

                else if (this.value == 'Public-Private' && $('#AvailabilityZones').val() == 'Two')
                {


                    $('#PuS1').show(),
                        $('#PublicSubnet1Route').show(),

                        $('#PuS2').show(),
                        $('#PublicSubnet2Route').show(),

                        $('#PuS3').hide(),
                        $('#PublicSubnet3Route').hide(),

                        $('#PuS4').hide(),
                        $('#PublicSubnet4Route').hide(),



                        $('#PrS1').show(),
                        $('#PrivateSubnet1Route').show(),

                        $('#PrS2').show(),
                        $('#PrivateSubnet2Route').show(),

                        $('#PrS3').hide(),
                        $('#PrivateSubnet3Route').hide(),

                        $('#PrS4').hide(),
                        $('#PrivateSubnet4Route').hide(),


                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', true),
                        $('input[name=PuS2Checkbox]').attr('checked', true),
                        $('input[name=PuS3Checkbox]').attr('checked', false),
                        $('input[name=PuS4Checkbox]').attr('checked', false),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS3Checkbox]').attr('checked', false),
                        $('input[name=PrS4Checkbox]').attr('checked', false),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", false),
                        $("#PuS2Checkbox").attr("disabled", false),
                        $("#PuS3Checkbox").attr("disabled", true),
                        $("#PuS4Checkbox").attr("disabled", true),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", false),
                        $("#PrS2Checkbox").attr("disabled", false),
                        $("#PrS3Checkbox").attr("disabled", true),
                        $("#PrS4Checkbox").attr("disabled", true);



                }
                else if (this.value == 'Public-Private' && $('#AvailabilityZones').val() == 'Three')
                {

                    $('#PuS1').show(),
                        $('#PublicSubnet1Route').show(),

                        $('#PuS2').show(),
                        $('#PublicSubnet2Route').show(),

                        $('#PuS3').show(),
                        $('#PublicSubnet3Route').show(),

                        $('#PuS4').hide(),
                        $('#PublicSubnet4Route').hide(),



                        $('#PrS1').show(),
                        $('#PrivateSubnet1Route').show(),

                        $('#PrS2').show(),
                        $('#PrivateSubnet2Route').show(),

                        $('#PrS3').show(),
                        $('#PrivateSubnet3Route').show(),

                        $('#PrS4').hide(),
                        $('#PrivateSubnet4Route').hide(),

                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', true),
                        $('input[name=PuS2Checkbox]').attr('checked', true),
                        $('input[name=PuS3Checkbox]').attr('checked', true),
                        $('input[name=PuS4Checkbox]').attr('checked', false),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS3Checkbox]').attr('checked', true),
                        $('input[name=PrS4Checkbox]').attr('checked', false),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", false),
                        $("#PuS2Checkbox").attr("disabled", false),
                        $("#PuS3Checkbox").attr("disabled", false),
                        $("#PuS4Checkbox").attr("disabled", true),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", false),
                        $("#PrS2Checkbox").attr("disabled", false),
                        $("#PrS3Checkbox").attr("disabled", false),
                        $("#PrS4Checkbox").attr("disabled", true);



                }
                else if (this.value == 'Public-Private' && $('#AvailabilityZones').val() == 'Four')
                {

                    $('#PuS1').show(),
                        $('#PublicSubnet1Route').show(),

                        $('#PuS2').show(),
                        $('#PublicSubnet2Route').show(),

                        $('#PuS3').show(),
                        $('#PublicSubnet3Route').show(),

                        $('#PuS4').show(),
                        $('#PublicSubnet4Route').show(),



                        $('#PrS1').show(),
                        $('#PrivateSubnet1Route').show(),

                        $('#PrS2').show(),
                        $('#PrivateSubnet2Route').show(),

                        $('#PrS3').show(),
                        $('#PrivateSubnet3Route').show(),

                        $('#PrS4').show(),
                        $('#PrivateSubnet4Route').show(),

                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', true),
                        $('input[name=PuS2Checkbox]').attr('checked', true),
                        $('input[name=PuS3Checkbox]').attr('checked', true),
                        $('input[name=PuS4Checkbox]').attr('checked', true),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS3Checkbox]').attr('checked', true),
                        $('input[name=PrS4Checkbox]').attr('checked', true),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", false),
                        $("#PuS2Checkbox").attr("disabled", false),
                        $("#PuS3Checkbox").attr("disabled", false),
                        $("#PuS4Checkbox").attr("disabled", false),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", false),
                        $("#PrS2Checkbox").attr("disabled", false),
                        $("#PrS3Checkbox").attr("disabled", false),
                        $("#PrS4Checkbox").attr("disabled", false);






                }

            });
        });

    </script>




        <script>
        $(document).ready(function(){
            $('#subnet-tiers').on('change', function(){
                if (this.value == 'Public-Only' && $('#AvailabilityZones').val() == 'One' ) {

                    $('#PuS1').show(),
                        $('#PublicSubnet1Route').show(),

                        $('#PuS2').hide(),
                        $('#PublicSubnet2Route').hide(),

                        $('#PuS3').hide(),
                        $('#PublicSubnet3Route').hide(),

                        $('#PuS4').hide(),
                        $('#PublicSubnet4Route').hide(),



                        $('#PrS1').hide(),
                        $('#PrivateSubnet1Route').hide(),

                        $('#PrS2').hide(),
                        $('#PrivateSubnet2Route').hide(),

                        $('#PrS3').hide(),
                        $('#PrivateSubnet3Route').hide(),

                        $('#PrS4').hide(),
                        $('#PrivateSubnet4Route').hide(),


                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', true),
                        $('input[name=PuS2Checkbox]').attr('checked', false),
                        $('input[name=PuS3Checkbox]').attr('checked', false),
                        $('input[name=PuS4Checkbox]').attr('checked', false),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', false),
                        $('input[name=PrS2Checkbox]').attr('checked', false),
                        $('input[name=PrS3Checkbox]').attr('checked', false),
                        $('input[name=PrS4Checkbox]').attr('checked', false),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", false),
                        $("#PuS2Checkbox").attr("disabled", true),
                        $("#PuS3Checkbox").attr("disabled", true),
                        $("#PuS4Checkbox").attr("disabled", true),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", true),
                        $("#PrS2Checkbox").attr("disabled", true),
                        $("#PrS3Checkbox").attr("disabled", true),
                        $("#PrS4Checkbox").attr("disabled", true);





                }

                else if (this.value == 'Public-Only' && $('#AvailabilityZones').val() == 'Two')
                {


                    $('#PuS1').show(),
                        $('#PublicSubnet1Route').show(),

                        $('#PuS2').show(),
                        $('#PublicSubnet2Route').show(),

                        $('#PuS3').hide(),
                        $('#PublicSubnet3Route').hide(),

                        $('#PuS4').hide(),
                        $('#PublicSubnet4Route').hide(),



                        $('#PrS1').hide(),
                        $('#PrivateSubnet1Route').hide(),

                        $('#PrS2').hide(),
                        $('#PrivateSubnet2Route').hide(),

                        $('#PrS3').hide(),
                        $('#PrivateSubnet3Route').hide(),

                        $('#PrS4').hide(),
                        $('#PrivateSubnet4Route').hide(),


                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', true),
                        $('input[name=PuS2Checkbox]').attr('checked', true),
                        $('input[name=PuS3Checkbox]').attr('checked', false),
                        $('input[name=PuS4Checkbox]').attr('checked', false),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', false),
                        $('input[name=PrS2Checkbox]').attr('checked', false),
                        $('input[name=PrS3Checkbox]').attr('checked', false),
                        $('input[name=PrS4Checkbox]').attr('checked', false),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", false),
                        $("#PuS2Checkbox").attr("disabled", false),
                        $("#PuS3Checkbox").attr("disabled", true),
                        $("#PuS4Checkbox").attr("disabled", true),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", true),
                        $("#PrS2Checkbox").attr("disabled", true),
                        $("#PrS3Checkbox").attr("disabled", true),
                        $("#PrS4Checkbox").attr("disabled", true);



                }
                else if (this.value == 'Public-Only' && $('#AvailabilityZones').val() == 'Three')
                {

                    $('#PuS1').show(),
                        $('#PublicSubnet1Route').show(),

                        $('#PuS2').show(),
                        $('#PublicSubnet2Route').show(),

                        $('#PuS3').show(),
                        $('#PublicSubnet3Route').show(),

                        $('#PuS4').hide(),
                        $('#PublicSubnet4Route').hide(),



                        $('#PrS1').hide(),
                        $('#PrivateSubnet1Route').hide(),

                        $('#PrS2').hide(),
                        $('#PrivateSubnet2Route').hide(),

                        $('#PrS3').hide(),
                        $('#PrivateSubnet3Route').hide(),

                        $('#PrS4').hide(),
                        $('#PrivateSubnet4Route').hide(),

                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', true),
                        $('input[name=PuS2Checkbox]').attr('checked', true),
                        $('input[name=PuS3Checkbox]').attr('checked', true),
                        $('input[name=PuS4Checkbox]').attr('checked', false),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', false),
                        $('input[name=PrS2Checkbox]').attr('checked', false),
                        $('input[name=PrS3Checkbox]').attr('checked', false),
                        $('input[name=PrS4Checkbox]').attr('checked', false),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", false),
                        $("#PuS2Checkbox").attr("disabled", false),
                        $("#PuS3Checkbox").attr("disabled", false),
                        $("#PuS4Checkbox").attr("disabled", true),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", true),
                        $("#PrS2Checkbox").attr("disabled", true),
                        $("#PrS3Checkbox").attr("disabled", true),
                        $("#PrS4Checkbox").attr("disabled", true);



                }
                else if (this.value == 'Public-Only' && $('#AvailabilityZones').val() == 'Four')
                {

                    $('#PuS1').show(),
                        $('#PublicSubnet1Route').show(),

                        $('#PuS2').show(),
                        $('#PublicSubnet2Route').show(),

                        $('#PuS3').show(),
                        $('#PublicSubnet3Route').show(),

                        $('#PuS4').show(),
                        $('#PublicSubnet4Route').show(),



                        $('#PrS1').hide(),
                        $('#PrivateSubnet1Route').hide(),

                        $('#PrS2').hide(),
                        $('#PrivateSubnet2Route').hide(),

                        $('#PrS3').hide(),
                        $('#PrivateSubnet3Route').hide(),

                        $('#PrS4').hide(),
                        $('#PrivateSubnet4Route').hide(),

                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', true),
                        $('input[name=PuS2Checkbox]').attr('checked', true),
                        $('input[name=PuS3Checkbox]').attr('checked', true),
                        $('input[name=PuS4Checkbox]').attr('checked', true),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', false),
                        $('input[name=PrS2Checkbox]').attr('checked', false),
                        $('input[name=PrS3Checkbox]').attr('checked', false),
                        $('input[name=PrS4Checkbox]').attr('checked', false),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", false),
                        $("#PuS2Checkbox").attr("disabled", false),
                        $("#PuS3Checkbox").attr("disabled", false),
                        $("#PuS4Checkbox").attr("disabled", false),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", true),
                        $("#PrS2Checkbox").attr("disabled", true),
                        $("#PrS3Checkbox").attr("disabled", true),
                        $("#PrS4Checkbox").attr("disabled", true);






                }




            });
        });



    </script>




    <script>
        //script for Subnet Tiers is Private Only, and Availabiltiy Zones keep on changing:
        $(document).ready(function(){
            $('#subnet-tiers').on('change', function(){
                if (this.value == 'Private-Only' && $('#AvailabilityZones').val() == 'One' ) {

                    $('#PuS1').hide(),
                        $('#PublicSubnet1Route').hide(),

                        $('#PuS2').hide(),
                        $('#PublicSubnet2Route').hide(),

                        $('#PuS3').hide(),
                        $('#PublicSubnet3Route').hide(),

                        $('#PuS4').hide(),
                        $('#PublicSubnet4Route').hide(),



                        $('#PrS1').show(),
                        $('#PrivateSubnet1Route').show(),

                        $('#PrS2').hide(),
                        $('#PrivateSubnet2Route').hide(),

                        $('#PrS3').hide(),
                        $('#PrivateSubnet3Route').hide(),

                        $('#PrS4').hide(),
                        $('#PrivateSubnet4Route').hide(),


                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', false),
                        $('input[name=PuS2Checkbox]').attr('checked', false),
                        $('input[name=PuS3Checkbox]').attr('checked', false),
                        $('input[name=PuS4Checkbox]').attr('checked', false),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS2Checkbox]').attr('checked', false),
                        $('input[name=PrS3Checkbox]').attr('checked', false),
                        $('input[name=PrS4Checkbox]').attr('checked', false),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", true),
                        $("#PuS2Checkbox").attr("disabled", true),
                        $("#PuS3Checkbox").attr("disabled", true),
                        $("#PuS4Checkbox").attr("disabled", true),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", false),
                        $("#PrS2Checkbox").attr("disabled", true),
                        $("#PrS3Checkbox").attr("disabled", true),
                        $("#PrS4Checkbox").attr("disabled", true);





                }

                else if (this.value == 'Private-Only' && $('#AvailabilityZones').val() == 'Two')
                {


                    $('#PuS1').hide(),
                        $('#PublicSubnet1Route').hide(),

                        $('#PuS2').hide(),
                        $('#PublicSubnet2Route').hide(),

                        $('#PuS3').hide(),
                        $('#PublicSubnet3Route').hide(),

                        $('#PuS4').hide(),
                        $('#PublicSubnet4Route').hide(),



                        $('#PrS1').show(),
                        $('#PrivateSubnet1Route').show(),

                        $('#PrS2').show(),
                        $('#PrivateSubnet2Route').show(),

                        $('#PrS3').hide(),
                        $('#PrivateSubnet3Route').hide(),

                        $('#PrS4').hide(),
                        $('#PrivateSubnet4Route').hide(),


                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', false),
                        $('input[name=PuS2Checkbox]').attr('checked', false),
                        $('input[name=PuS3Checkbox]').attr('checked', false),
                        $('input[name=PuS4Checkbox]').attr('checked', false),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS3Checkbox]').attr('checked', false),
                        $('input[name=PrS4Checkbox]').attr('checked', false),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", true),
                        $("#PuS2Checkbox").attr("disabled", true),
                        $("#PuS3Checkbox").attr("disabled", true),
                        $("#PuS4Checkbox").attr("disabled", true),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", false),
                        $("#PrS2Checkbox").attr("disabled", false),
                        $("#PrS3Checkbox").attr("disabled", true),
                        $("#PrS4Checkbox").attr("disabled", true);



                }
                else if (this.value == 'Private-Only' && $('#AvailabilityZones').val() == 'Three')
                {

                    $('#PuS1').hide(),
                        $('#PublicSubnet1Route').hide(),

                        $('#PuS2').hide(),
                        $('#PublicSubnet2Route').hide(),

                        $('#PuS3').hide(),
                        $('#PublicSubnet3Route').hide(),

                        $('#PuS4').hide(),
                        $('#PublicSubnet4Route').hide(),



                        $('#PrS1').show(),
                        $('#PrivateSubnet1Route').show(),

                        $('#PrS2').show(),
                        $('#PrivateSubnet2Route').show(),

                        $('#PrS3').show(),
                        $('#PrivateSubnet3Route').show(),

                        $('#PrS4').hide(),
                        $('#PrivateSubnet4Route').hide(),

                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', false),
                        $('input[name=PuS2Checkbox]').attr('checked', false),
                        $('input[name=PuS3Checkbox]').attr('checked', false),
                        $('input[name=PuS4Checkbox]').attr('checked', false),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS3Checkbox]').attr('checked', true),
                        $('input[name=PrS4Checkbox]').attr('checked', false),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", true),
                        $("#PuS2Checkbox").attr("disabled", true),
                        $("#PuS3Checkbox").attr("disabled", true),
                        $("#PuS4Checkbox").attr("disabled", true),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", false),
                        $("#PrS2Checkbox").attr("disabled", false),
                        $("#PrS3Checkbox").attr("disabled", false),
                        $("#PrS4Checkbox").attr("disabled", true);



                }
                else if (this.value == 'Private-Only' && $('#AvailabilityZones').val() == 'Four')
                {

                    $('#PuS1').hide(),
                        $('#PublicSubnet1Route').hide(),

                        $('#PuS2').hide(),
                        $('#PublicSubnet2Route').hide(),

                        $('#PuS3').hide(),
                        $('#PublicSubnet3Route').hide(),

                        $('#PuS4').hide(),
                        $('#PublicSubnet4Route').hide(),



                        $('#PrS1').show(),
                        $('#PrivateSubnet1Route').show(),

                        $('#PrS2').show(),
                        $('#PrivateSubnet2Route').show(),

                        $('#PrS3').show(),
                        $('#PrivateSubnet3Route').show(),

                        $('#PrS4').show(),
                        $('#PrivateSubnet4Route').show(),

                        //public subnets checked true or false

                        $('input[name=PuS1Checkbox]').attr('checked', false),
                        $('input[name=PuS2Checkbox]').attr('checked', false),
                        $('input[name=PuS3Checkbox]').attr('checked', false),
                        $('input[name=PuS4Checkbox]').attr('checked', false),



                        //private subnets checked true or false

                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS2Checkbox]').attr('checked', true),
                        $('input[name=PrS3Checkbox]').attr('checked', true),
                        $('input[name=PrS4Checkbox]').attr('checked', true),



                        //public subnets disables true or false

                        $("#PuS1Checkbox").attr("disabled", true),
                        $("#PuS2Checkbox").attr("disabled", true),
                        $("#PuS3Checkbox").attr("disabled", true),
                        $("#PuS4Checkbox").attr("disabled", true),


                        //private subnets disabled true or false

                        $("#PrS1Checkbox").attr("disabled", false),
                        $("#PrS2Checkbox").attr("disabled", false),
                        $("#PrS3Checkbox").attr("disabled", false),
                        $("#PrS4Checkbox").attr("disabled", false);






                }




            });
        });



    </script>



    <!-- IGW dropdown --->
    <script>
        $(document).ready(function(){
            $('#InternetConnectivity').on('change', function(){
                if (this.value == 'None') {

                    $('#IGW').hide(),
                    $('#IGWRoute').hide();
                    $('#NAT').hide(),
                    $('#NATRoute').hide(),

                    $('input[name=IGWCheckbox]').attr('checked', false),
                    $('input[name=NATCheckbox]').attr('checked', false);



                }
                else if (this.value == 'IGW-Only') {

                    $('#IGW').show(),
                    $('#IGWRoute').show();
                    $('#NAT').hide(),
                    $('#NATRoute').hide(),

                    $('input[name=IGWCheckbox]').attr('checked', true),
                    $('input[name=NATCheckbox]').attr('checked', false);


                }
                else if (this.value == 'IGW-NAT'){

                    $('#IGW').show(),
                    $('#IGWRoute').show();
                    $('#NAT').show(),
                    $('#NATRoute').show(),

                    $('input[name=IGWCheckbox]').attr('checked', true),
                    $('input[name=NATCheckbox]').attr('checked', true);


                }

            });
            });

    </script>



    <!--- IGW / NAT checkboxes--->
    <script>
        $(document).ready(function(){
            $('#InternetConnectivity').on('change', function(){
                if (this.value == 'None') {

                    $('#IGW').hide(),
                        $('#IGWRoute').hide();
                    $('#NAT').hide(),
                        $('#NATRoute').hide();



                }
                else if (this.value == 'IGW-Only') {

                    $('#IGW').show(),
                        $('#IGWRoute').show();
                    $('#NAT').hide(),
                        $('#NATRoute').hide();


                }
                else if (this.value == 'IGW-NAT'){

                    $('#IGW').show(),
                        $('#IGWRoute').show();
                    $('#NAT').show(),
                        $('#NATRoute').show();


                }

            });
        });
    </script>


    <script src="jquery-3.3.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<div class="container">

    <!--- Navbar --->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" >AutoMate</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/vpc">VPC</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/ec2">EC2</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        More
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">S3</a>
                        <a class="dropdown-item" href="#">RDS</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About AutoMate</a>
                </li>
            </ul>



            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="history">History</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>

        </div>
    </nav>
    <br><br>

<body>

<!--- text --->

<h3 style="text-align: center">Deploy an Amazon VPC</h3>

</br>

<h3 style="text-align: left">Overview</h3>

<hr style="color: lightgrey">

<p style="font-size: 17px; text-align: left">A configuration package to deploy an <b>Amazon VPC</b> with predefined presets to select: Subnet Tiers (Public and Private),
    Availability Zones, and Internet Connectivity. Configuration includes <b>Subnets, Routing Tables, Internet Gateway, Nat Gateways,</b> and <b>Security Groups.</b></p>

<br/>

<h3 style="text-align: left">Configure & Deploy</h3>

<hr style="color: lightgrey">

<br/>

<h5 style="text-align: center">Configuration Presets</h5>

<br/>





<!-- VPCModal -->
<div class="modal fade" id="VPCModal" tabindex="-1" role="dialog" aria-labelledby="VPCModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="VPCModalLabel">VPC</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>VPC Name</label>
                <input type="text" id="vpc-name" value="testvpc" style="margin-top: -10px;">
                <br>
                <label>CIDR Block</label>
                <input type="text" pattern="[0-255].[0-255].[0-255].[0-255]/*" id="vpc-cidr" value="10.0.0.0/16">


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="printVar()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- PuS1Modal -->
<div class="modal fade" id="PuS1Modal" tabindex="-1" role="dialog" aria-labelledby="PuS1ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PuS1ModalLabel">Public Subnet 1</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Subnet Name</p>
                <input class="form-control" type="text" id="pus1-name" value="Public Subnet AZ A">
                <br>

                <p>CIDR Block</p>
                <input class="form-control" type="text" id="pus1-cidr" value="10.0.0.0/24">
                <br>

                <p>Auto-Assign Public IPs</p>
                <select class="form-control" id="pus1-auto">
                    <option value="True">True</option>
                    <option value="False" selected>False</option>
                </select>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="printPuS1Var()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- PuS2Modal -->
<div class="modal fade" id="PuS2Modal" tabindex="-1" role="dialog" aria-labelledby="PuS2ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PuS2ModalLabel">Public Subnet 2</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Subnet Name</p>
                <input class="form-control" type="text" value="Public Subnet AZ B" id="pus2-name">
                <br>

                <p>CIDR Block</p>
                <input class="form-control" type="text" id="pus2-cidr" value="10.0.1.0/24">
                <br>

                <p>Auto-Assign Public IPs</p>
                <select class="form-control" id="pus2-auto">
                    <option value="True">True</option>
                    <option value="False"selected>False</option>
                </select>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="printPuS2Var()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- PuS3Modal -->
<div class="modal fade" id="PuS3Modal" tabindex="-1" role="dialog" aria-labelledby="PuS3ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PuS3ModalLabel">Public Subnet 3</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Subnet Name</p>
                <input class="form-control" type="text" value="Public Subnet AZ C" id="pus3-name">
                <br>

                <p>CIDR Block</p>
                <input class="form-control" type="text" value="10.0.2.0/24" id="pus3-cidr">
                <br>

                <p>Auto-Assign Public IPs</p>
                <select class="form-control" id="pus3-auto">
                    <option value="True">True</option>
                    <option value="False"selected>False</option>
                </select>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="printPuS3Var()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- PuS4Modal -->
<div class="modal fade" id="PuS4Modal" tabindex="-1" role="dialog" aria-labelledby="PuS4ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PuS4ModalLabel">Public Subnet 4</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Subnet Name</p>
                <input class="form-control" type="text" value="Public Subnet AZ D" id="pus4-name">
                <br>

                <p>CIDR Block</p>
                <input class="form-control" type="text" value="10.0.3.0/24" id="pus4-cidr">
                <br>

                <p>Auto-Assign Public IPs</p>
                <select class="form-control" id="pus4-auto">
                    <option value="True">True</option>
                    <option value="False"selected>False</option>
                </select>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="printPuS4Var()">Save changes</button>
            </div>
        </div>
    </div>
</div>


<!-- PrS1Modal -->
<div class="modal fade" id="PrS1Modal" tabindex="-1" role="dialog" aria-labelledby="PrS1ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PrS1ModalLabel">Private Subnet 1</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Subnet Name</p>
                <input class="form-control" type="text" value="Private Subnet AZ A" id="prs1-name">
                <br>

                <p>CIDR Block</p>
                <input class="form-control" type="text" value="10.0.10.0/24" id="prs1-cidr">
                <br>

                <p>Auto-Assign Public IPs</p>
                <select class="form-control" id="prs1-auto">
                    <option value="True">True</option>
                    <option value="False"selected>False</option>
                </select>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="printPrS1Var()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- PrS2Modal -->
<div class="modal fade" id="PrS2Modal" tabindex="-1" role="dialog" aria-labelledby="PrS2ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PrS2ModalLabel">Private Subnet 2</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Subnet Name</p>
                <input class="form-control" type="text" value="Private Subnet AZ B" id="prs2-name">
                <br>

                <p>CIDR Block</p>
                <input class="form-control" type="text" value="10.0.11.0/24" id="prs2-cidr">
                <br>

                <p>Auto-Assign Public IPs</p>
                <select class="form-control" id="prs2-auto">
                    <option value="True">True</option>
                    <option value="False"selected>False</option>
                </select>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="printPrS2Var()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- PrS3Modal -->
<div class="modal fade" id="PrS3Modal" tabindex="-1" role="dialog" aria-labelledby="PrS3ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PrS3ModalLabel">Private Subnet 3</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Subnet Name</p>
                <input class="form-control" type="text" value="Private Subnet AZ C" id="prs3-name">
                <br>

                <p>CIDR Block</p>
                <input class="form-control" type="text" value="10.0.12.0/24" id="prs3-cidr">
                <br>

                <p>Auto-Assign Public IPs</p>
                <select class="form-control" id="prs3-auto">
                    <option value="True">True</option>
                    <option value="False"selected>False</option>
                </select>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="printPrS3Var()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- PrS4Modal -->
<div class="modal fade" id="PrS4Modal" tabindex="-1" role="dialog" aria-labelledby="PrS4ModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PrS4ModalLabel">Private Subnet 4</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Subnet Name</p>
                <input class="form-control" type="text" value="Private Subnet AZ D" id="prs4-name">
                <br>

                <p>CIDR Block</p>
                <input class="form-control" type="text" value="10.0.13.0/24" id="prs4-cidr">
                <br>

                <p>Auto-Assign Public IPs</p>
                <select class="form-control" id="prs4-auto">
                    <option value="True">True</option>
                    <option value="False"selected>False</option>
                </select>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="printPrS4Var()">Save changes</button>
            </div>
        </div>
    </div>
</div>



<form style="text-align: left; width: 900px; height: 285px;">

    <label>Subnet Tiers:</label>
    <select name="subnet-tiers" id="subnet-tiers">
        <option value="Public-Only">Public-Only</option>
        <option value="Private-Only">Private-Only</option>
        <option value="Public-Private" selected>Public-Private</option>
    </select>

    <p style="display: inline"> &nbsp &nbsp &nbsp &nbsp &nbsp &#9658; Create two subnet tiers: public and private</p>


    </br><br>
    <label>Availability Zones:</label>
    <select name="AvailabilityZones" id="AvailabilityZones">
        <option value="One">One</option>
        <option value="Two" selected>Two</option>
        <option value="Three">Three</option>
        <option value="Four">Four</option>
    </select>

    <p style="display: inline"> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &#9658; Each subnet tier will contain 2 subnets (using the first 2 AZs of the region)</p>

    </br><br>
    <label>Internet Connectivity:</label>
    <select name="InternetConnectivity" id="InternetConnectivity">
        <option value="None">None</option>
        <option value="IGW-Only" selected>IGW-Only</option>
        <option value="IGW-NAT">IGW-NAT</option>
    </select>

    <p style="display: inline"> &nbsp&nbsp &#9658; Provisions an Internet Gateway (IGW) attached to the VPC</p>
    <p style="padding-left: 280px;"> &nbsp &#9658; Allows direct inbound and outbound internet connectivity to the public subnet tier</p>

</form>


<h5 style="text-align: center">Configuration Template</h5>

<br/>

<div class="right" style="float: right; color:rgb(25, 144, 184); width: 700px; padding: 30px; font-size: 16px; border: 1px solid lightgrey; text-align: left; display:inline-block;">

<button type="button" class="btn btn-primary" style="float: right;">Save To History</button>
<button type="button" class="btn btn-info" style="float: right;">Download File</button>
<br><br>


    @foreach($templates as $template)
        <div class="well">
            {!! $template->code !!}

        </div>
    @endforeach






<div style="float: left; width: 400px; height: 600px; border: 1px solid lightgrey; padding: 20px; display:inline-block; alignment: left;">
    <label style="font-weight: bold; font-size: large;"><input type="checkbox" id="VPCCheckbox" name="VPCCheckbox" value="VPC" checked> VPC</label>
    <span style="float: right; cursor: pointer;" data-toggle="modal" data-target="#VPCModal" >Edit</span>
    <br><br>
    <h4>Public Subnet Tier:</h4>

    <label><input type="checkbox" id="PuS1Checkbox" name="PuS1Checkbox" value="PublicSubnet1" checked> Public Subnet 1</label>
    <span style="float: right; cursor: pointer;" data-toggle="modal" data-target="#PuS1Modal" >Edit</span>
    <br>
    <label><input type="checkbox" id="PuS2Checkbox" name="PuS2Checkbox" value="PublicSubnet2" checked> Public Subnet 2</label>
    <span style="float: right; cursor: pointer;" data-toggle="modal" data-target="#PuS2Modal" >Edit</span>
    <br>
    <label><input type="checkbox" id="PuS3Checkbox" name="PuS3Checkbox" value="PublicSubnet3" disabled> Public Subnet 3</label>
    <span style="float: right; cursor: pointer;" data-toggle="modal" data-target="#PuS3Modal" >Edit</span>
    <br>
    <label><input type="checkbox" id="PuS4Checkbox" name="PuS4Checkbox" value="PublicSubnet4" disabled> Public Subnet 4</label>
    <span style="float: right; cursor: pointer;" data-toggle="modal" data-target="#PuS4Modal" >Edit</span>
    <br><br>

    <h4>Private Subnet Tier:</h4>
    <label><input type="checkbox" id="PrS1Checkbox" name="PrS1Checkbox" value="PrivateSubnet1" checked> Private Subnet 1</label>
    <span style="float: right; cursor: pointer;" data-toggle="modal" data-target="#PrS1Modal" >Edit</span>
    <br>
    <label><input type="checkbox" id="PrS2Checkbox" name="PrS2Checkbox" value="PrivateSubnet2" checked> Private Subnet 2</label>
    <span style="float: right; cursor: pointer;" data-toggle="modal" data-target="#PrS2Modal" >Edit</span>
    <br>
    <label><input type="checkbox" id="PrS3Checkbox" name="PrS3Checkbox" value="PrivateSubnet3" disabled> Private Subnet 3</label>
    <span style="float: right; cursor: pointer;" data-toggle="modal" data-target="#PrS3Modal" >Edit</span>
    <br>
    <label><input type="checkbox" id="PrS4Checkbox" name="PrS4Checkbox" value="PrivateSubnet4" disabled> Private Subnet 4</label>
    <span style="float: right; cursor: pointer;" data-toggle="modal" data-target="#PrS4Modal" >Edit</span>
    <br><br>
    <label style="font-weight: bold; font-size: large;"><input type="checkbox" id="IGWCheckbox" name="IGWCheckbox" value="IGW" checked> Internet Gateway</label>
    <span style="float: right; cursor: pointer;" data-toggle="modal" data-target="#VPCModal" >Edit</span>
    <br>
    <label style="font-weight: bold; font-size: large;"><input type="checkbox" id="NATCheckbox" name="NATCheckbox" value="NAT"> NAT Gateway</label>
    <span style="float: right; cursor: pointer;" data-toggle="modal" data-target="#VPCModal" >Edit</span>
    <br>




     <!--- <label><input type="checkbox" name="colorCheckbox" value="IGW"> Internet Gateway</label> --->
</div>


<br><br>





<br>


<br>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</div>
</html>