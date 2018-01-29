from django.db import models

class Content(models.Model):
    name = models.CharField(max_length=50)
    content = models.CharField(max_length=255)
    time = models.CharField(max_length=255)