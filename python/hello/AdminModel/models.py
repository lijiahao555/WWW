from django.db import models

# Create your Model here.
class Admin(models.Model):
    name = models.CharField(max_length=50)
    pwd = models.CharField(max_length=50)