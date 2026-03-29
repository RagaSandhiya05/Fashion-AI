from flask import Flask, request, jsonify
from flask_cors import CORS
import random

app = Flask(__name__)
CORS(app)

@app.route("/measure", methods=["POST"])
def measure():
    # images received (not processed in demo)
    front = request.files.get("front_image")
    side = request.files.get("side_image")

    if not front or not side:
        return jsonify({"error": "Images missing"}), 400

    # DEMO AI LOGIC (random but realistic values)
    height = random.randint(150, 175)
    bust = random.randint(80, 100)
    waist = random.randint(60, 85)
    hips = random.randint(85, 105)
    shoulder = random.randint(36, 44)
    sleeve = random.randint(50, 62)

    # Size logic
    if bust < 85:
        size = "S"
    elif bust < 95:
        size = "M"
    else:
        size = "L"

    return jsonify({
        "height": height,
        "bust": bust,
        "waist": waist,
        "hips": hips,
        "shoulder": shoulder,
        "sleeve": sleeve,
        "confidence": "92%",
        "size": size
    })

if __name__ == "__main__":
    app.run(debug=True)

# from flask import Flask, request, jsonify
# from flask_cors import CORS
# import cv2
# import mediapipe as mp
# import numpy as np
# import math
# import tempfile
# import os

# app = Flask(__name__)
# CORS(app)

# mp_pose = mp.solutions.pose
# pose = mp_pose.Pose(static_image_mode=True)

# def distance(p1, p2):
#     return math.sqrt((p1.x - p2.x)**2 + (p1.y - p2.y)**2)

# @app.route("/measure", methods=["POST"])
# def measure():

#     front = request.files.get("front_image")
#     side = request.files.get("side_image")

#     if not front or not side:
#         return jsonify({"error": "Images missing"}), 400

#     # Save image temporarily
#     temp = tempfile.NamedTemporaryFile(delete=False, suffix=".jpg")
#     front.save(temp.name)

#     image = cv2.imread(temp.name)
#     image_rgb = cv2.cvtColor(image, cv2.COLOR_BGR2RGB)

#     results = pose.process(image_rgb)

#     if not results.pose_landmarks:
#         return jsonify({"error": "No human detected"}), 400

#     lm = results.pose_landmarks.landmark

#     # Landmark references
#     shoulder_left = lm[mp_pose.PoseLandmark.LEFT_SHOULDER]
#     shoulder_right = lm[mp_pose.PoseLandmark.RIGHT_SHOULDER]
#     hip_left = lm[mp_pose.PoseLandmark.LEFT_HIP]
#     hip_right = lm[mp_pose.PoseLandmark.RIGHT_HIP]
#     ankle_left = lm[mp_pose.PoseLandmark.LEFT_ANKLE]
#     head = lm[mp_pose.PoseLandmark.NOSE]

#     # Pixel ratios (relative)
#     shoulder_width = distance(shoulder_left, shoulder_right)
#     hip_width = distance(hip_left, hip_right)
#     body_height = distance(head, ankle_left)

#     # 🔑 ASSUMED HEIGHT (User calibration)
#     REAL_HEIGHT_CM = 165   # Ask user height for best accuracy

#     scale = REAL_HEIGHT_CM / body_height

#     bust = shoulder_width * scale * 100
#     hips = hip_width * scale * 100
#     waist = hips * 0.75
#     shoulder = bust * 0.25
#     sleeve = REAL_HEIGHT_CM * 0.35

#     # Size logic
#     if bust < 85:
#         size = "S"
#     elif bust < 95:
#         size = "M"
#     else:
#         size = "L"

#     return jsonify({
#         "height": round(REAL_HEIGHT_CM, 1),
#         "bust": round(bust, 1),
#         "waist": round(waist, 1),
#         "hips": round(hips, 1),
#         "shoulder": round(shoulder, 1),
#         "sleeve": round(sleeve, 1),
#         "confidence": "85–92%",
#         "size": size
#     })

# if __name__ == "__main__":
#     app.run(debug=True)
