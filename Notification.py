#!/usr/bin/env python
import time
from plyer import notification
 
class Notify():
  def __init__(self, product, amount, other):
    self.product = product
    self.amount = amount
    self.other = other

  def notify(self):
    if __name__=="__main__":
      notification.notify(
        title = self.product,
        message="Replace batteries with"+self.other,      
        # displaying time
        timeout=2
      )
      # waiting time
      time.sleep(7)

Notify($_GET["product"], $_GET["amount"], $_GET["other"]).notify()