
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

        $(document).on('click','#save',function(event){
            event.preventDefault();
            $.ajax({
            type:'post',
            url:"{{route('save')}}",
            data:{
                '_token': "{{csrf_token()}}",
                'title': $("input[name='title']").val(),
                'body':$("input[name='body']").val(),
                'user_id':$("input[name='user_id']").val(),
            },
            success:function(data) {
            
            }, error: function(reject) {
              
            }
           
            })});
            