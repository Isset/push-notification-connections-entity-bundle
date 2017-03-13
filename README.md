# IssetBVPushNotificationConnectionsEntityBundle
Bundle for handling notification connections with a database

### config
To send messages add connections to the isset_bv_push_notification config in config.yml

````yaml
isset_bv_push_notification:
    connection_handler: 'isset_bv_push_notification_connections_entity.entity_connection_handler'
````