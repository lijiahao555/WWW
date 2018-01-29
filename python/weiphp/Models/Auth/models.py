from django.db import models

class Auth(models.Model):
    open_id = models.CharField(max_length=32, blank=True, null=True)
    search = models.CharField(max_length=30, blank=True, null=True)
    content = models.CharField(max_length=255, blank=True, null=True)

class Auth_Content(models.Model):
    content = models.CharField(max_length=255, blank=True, null=True)