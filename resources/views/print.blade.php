<html>
    <head>
        <title>Character</title>
        <style>
            .noprint {
                width: 100%;
            }
            .input {
                width: 20%;
                float: left;
            }
        </style>
        <style type="text/css" media="print">
            @media print {
                body {
                    background: none;
                    -ms-zoom: 1.665;
                }
                div.portrait, div.landscape {
                    margin: 0;
                    padding: 0;
                    border: none;
                    background: none;
                }
                div.landscape {
                    transform: rotate(270deg) translate(-276mm, 0);
                    transform-origin: 0 0;
                }
            }
        </style>
    </head>
    <body>
        <div class="noprint">
            <div class="input">
                <label for="fullname">Fullname</label>
                <input type="text" id="fullname" value="{{ $student->fullname }}">
            </div>
            <div class="input">
                <label for="fathername">Fathername</label>
                <input type="text" id="fathername" value="{{ $student->fathername }}">
            </div>
            <div class="input">
                <label for="mothername">Mothername</label>
                <input type="text" id="mothername" value="{{ $student->mothername }}">
            </div>
            <div class="input">
                <label for="municipality">Municipality</label>
                <input type="text" id="municipality" value="{{ $student->municipality }}">
            </div>
            <div class="input">
                <label for="ward">Ward</label>
                <input type="text" id="ward" value="{{ $student->ward }}">
            </div>
            <div class="input">
                <label for="district">District</label>
                <input type="text" id="district" value="{{ $student->district->district }}">
            </div>
            <div class="input">
                <label for="enrolledyearad">Enrolledyear AD</label>
                <input type="text" id="enrolledyearad" value="{{ $student->enrolledyear }}">
            </div>
            <div class="input">
                <label for="enrolledyearbs">Enrolledyear BS</label>
                <input type="text" id="enrolledyearbs" value="">
            </div>
            <div class="input">
                <label for="cgpa">CGPA</label>
                <input type="text" id="cgpa" value="{{ $student->cgpa }}">
            </div>
            <div class="input">
                <label for="character">Character</label>
                <input type="text" id="character">
            </div>
            <div class="input">
                <label for="passedyear">Passed Year</label>
                <input type="text" id="passedyear">
            </div>
            <div class="input">
                <label for="dobad">Date of birth AD</label>
                <input type="text" id="dobad" value="{{ $student->dobbs }}">
            </div>
            <div class="input">
                <label for="dobbs">Date of birth BS</label>
                <input type="text" id="dobbs" value="{{ $student->dobad }}">
            </div>
            <div class="input">
                <label for="symbolno">Symbol no</label>
                <input type="text" id="symbolno" value="{{ $student->symbolno }}">
            </div>
            <div class="input">
                <label for="nebregno">NEB Registration no</label>
                <input type="text" id="nebregno" value="{{ $student->nebregno }}">
            </div>
        </div>
        <div style="font-size:18px;width: 842px;">
            <div style="">
                <div style="margin-top:240px;text-align: center;padding: 10px 0px;" source="fullname">{{ $student->fullname }}</div>
                <div style="padding: 10px 0px;">
                    <span style="margin-left: 200px;" source="fathername">{{ $student->fathername }}</span><span style="margin-left: 250px;" source="mothername">{{ $student->mothername }}</span>
                </div>
                <div style="margin-left: 150px;padding: 10px 0px;" source="municipality">{{ $student->municipality }}</div>
                <div style="padding: 10px 0px;">
                    <span style="margin-left: 110px;" source="ward">{{ $student->ward }}</span><span style="margin-left: 50px;" source="district">{{ $student->district->district }}</span>
                </div>
                <div style="padding: 10px 0px;">
                    <span style="margin-left: 500px;" source="enrolledyearad">{{ $student->enrolledyear }}</span><span style="margin-left: 90px;" source="enrolledyearbs">2020</span><span style="margin-left: 135px;" source="cgpa">{{ $student->cgpa }}</span>
                </div>
                <div style="margin-left: 160px;padding: 10px 0px;" source="character">good chara</div>
                <div style="padding: 10px 0px;margin-top: 55px;">
                    <span style="margin-left: 150px;" source="passedyear">2076/2078</span><span style="margin-left: 515px;" source="dobad">{{ $student->symbolno }}</span>
                </div>
                <div style="padding: 10px 0px;">
                    <span style="margin-left: 125px;" source="dobbs">{{ $student->dobbs }}(<span style="margin-left: 125px;" source="symbolno">{{ $student->dobad }}</span>)</span><span style="margin-left: 465px;" source="nebregno">{{ $student->nebregno }}</span>
                </div>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('keyup', 'input[type="text"]', function() {
                var id = $(this).attr('id');
                $('[source="' + id + '"]').text($(this).val());
            });
        });
    </script>
</html>