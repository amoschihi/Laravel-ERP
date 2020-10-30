<template>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <div class="button"><i class="fa fa-bell"></i><span class="button__badge label">{{ notifications.length }}</span></div> <i class="fa fa-caret-down"></i>
      </a>
      <ul class="dropdown-menu dropdown-alerts">
        <li v-for="notification in notifications">
          <a href="#" v-on:click="MarkAsRead(notification)">
            <div>
              <i class="fa fa-comment fa-fw"></i> New Comment<br>
              <small>{{ notification.data.comment.subject }}</small>
              
              <span class="pull-right text-muted small">4 minutes ago</span>
            </div>
          </a>
        </li>
        <li v-if="notifications.length ==0">
            No new notifications
        </li>
      </ul>
      <!-- /.dropdown-alerts -->
    </li>
</template>

<script>
    export default {
        props: ['notifications'],
        methods: {
            MarkAsRead: function(notification) {
                var data = {
                    id: notification.id
                };
                axios.post('/notifications/read', data).then(response => {
                    window.location.href = '/admin/comments' + notification.data.comment.comment_id

                })
            }
        }
    }
</script>
